<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;

class JobOrderController extends Controller
{
    private function expireOldOrders(): void
    {
        // lazy schedule lmao
        DB::table('job_order')
            ->where('job_status', 'Awaiting-Payment')
            ->where('payment_status', false)
            ->where('order_at', '<=', Carbon::now()->subMinutes(30)) // expired within 30 min
            ->update([
                'job_status' => 'Expired-Payment',
            ]);
    }
    /**
     * CUSTOMER CHECKOUT
     * POST /api/jobs/{job_id}/checkout
     *
     * Input:
     *  - duration (int, required)
     *  - price_type (hour|day) -> must equal job.price_type
     *  - payment_method (bank_transfer|e_wallet|cod)
     *  - note (optional)
     *
     * Behaviour:
     *  - Validate duration & max duration (simple max)
     *  - Compute total_price = price_per_time * duration
     *  - deadline_at = now + duration (hours/days)
     *  - Insert into secprog.job_order with job_status = 'Awaiting-Payment'
     *  - NO WALLET CHANGE HERE (admin handles later)
     */
    public function checkout(Request $request, string $job_id)
    {
        $session = $request->user(); // get session

        // check job exist
        $job = DB::table('jobs')->where('job_id', $job_id)->first();
        if (!$job) return response()->json(['status'=>'error','message'=>'Job not found'], 404);
        if ($job->job_status !== 'available') return response()->json(['status'=>'error','message'=>'Job is not available'], 409);
        // securit wise, can't order your own
        // if ($job->user_id === $session->user_id) return response()->json(['status'=>'error','message'=>'You cannot order your own job'], 403);

        $validator = Validator::make($request->all(), [
            'duration'       => ['required','integer','min:1'],
            // 'price_type'     => ['required', Rule::in(['hour','day'])],
            'payment_method' => ['required', Rule::in(['transfer_bank','e-wallet','cod'])],
            'note'           => ['sometimes','nullable','string','max:255'],
        ], [
            'duration.required' => 'Duration is required.',
            'duration.min'      => 'Duration must be at least 1.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        // price type must match job's price_type (freelancer decides per hour/day)
        // if ($data['price_type'] !== $job->price_type) {
        //     return response()->json([
        //         'status'  => 'error',
        //         'message' => 'Selected price type does not match job configuration (currently using ' . $job->price_type . ')',
        //     ], 422);
        // }

        $duration = (int) $data['duration'];

        // max duration rule
        $maxDuration = 90;
        if (
            ($job->price_type === 'day' && $duration > $maxDuration) || 
            ($job->price_type === 'hour' && $duration/24 > $maxDuration)
            ) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Duration must not exceed maximum limit of 90 days.',
            ], 422);
        }

        // compute total_price & deadline
        $unitPrice  = (int) $job->price_per_time; // integer rupiah
        $totalPrice = $unitPrice * $duration;

        $startAt    = Carbon::now();
        $deadlineAt = $job->price_type === 'day'
            ? $startAt->copy()->addDays($duration)
            : $startAt->copy()->addHours($duration);

        // insert into secprog.job_order
        // recruiter_id -> customer_detail.user_id (same value as user.user_id)
        // freelancer_id -> freelancer_detail.user_id (same as job.user_id)
        $orderId = (string) Str::uuid();
        DB::table('job_order')->insertGetId([
            'order_id'        => $orderId,
            'price_type'      => $job->price_type,
            'duration_amount' => $duration,
            'order_note'      => $data['note'] ?? null,

            'job_status'      => 'Awaiting-Payment', // initial status
            'order_at'        => $startAt,
            'deadline_at'     => $deadlineAt,

            'payment_method'  => $data['payment_method'],
            'total_price'     => $totalPrice,

            'job_id'          => $job->job_id,
            'recruiter_id'    => $session->user_id,
            'freelancer_id'   => $job->user_id,
        ]);

        // simple email notifications
        // Load freelancer row
        $freelancer = DB::table('user')->where('user_id', $job->user_id)->first();
        $price_formatted = 'Rp ' . number_format((int)$totalPrice, 0, ',', '.');
        // email to freelancer
        if (!empty($freelancer?->email)) {
            Mail::raw(
                "New order received.\n\n".
                "Customer: {$session->username} ({$session->email})\n".
                "Duration: {$duration} {$job->price_type}\n".
                "Total price: {$price_formatted}\n".
                "Note: ".($data['note'] ?? '-')."\n",
                function ($m) use ($freelancer, $job) {
                    $m->to($freelancer->email)
                    ->subject('New order on your job ('. $job->job_title .')');
                }
            );
        }
        // email to customer
        Mail::raw(
            "Your order has been created.\n\n".
            "Job: {$job->job_title}\n".
            "Duration: {$duration} {$job->price_type}\n".
            "Total price: {$price_formatted}\n".
            "Status: Awaiting freelancer confirmation / payment\n",
            function ($m) use ($session) {
                $m->to($session->email)
                ->subject('Order summary');
            }
        );

        return response()->json([
            'status'  => 'success',
            'message' => 'Order created, waiting for payment / freelancer confirmation.',
            'data'    => [
                'order_id'     => $orderId,
                'job_title'    => $job->job_title,
                'duration'     => $duration.' '.$job->price_type,
                'total_price'  => $price_formatted,
                'deadline_at'  => $deadlineAt->toDateTimeString(),
                'job_status'   => 'Awaiting-Payment',
            ],
        ], 201);
    }

    // CUSTOMER: list own orders
    public function customerOrders(Request $request)
    {
        $this->expireOldOrders();
        
        $session = $request->user(); // get session

        $rows = DB::table('job_order')
            ->join('jobs', 'job_order.job_id', '=', 'jobs.job_id')
            ->where('job_order.recruiter_id', $session->user_id)
            ->orderBy('job_order.order_at', 'desc')
            ->get([
                'job_order.order_id',
                'jobs.job_title',
                'job_order.job_status',
                'job_order.total_price',
                'job_order.order_at',
            ]);
        
        
        $transformedRows = $rows->map(function ($item) {
            $price_formatted = 'Rp ' . number_format((int)$item->total_price, 0, ',', '.');
            return [
                'id'                     => $item->order_id,
                'title'                  => $item->job_title,
                'status'                 => $item->job_status,
                'price'                  => $price_formatted,
                'order_at'               => $item->order_at
            ];
        });

        return response()->json([
            'status'=>'success',
            'data'=>$transformedRows
        ]);
    }

    // FREELANCER: list incoming orders
    public function freelancerOrders(Request $request)
    {
        $this->expireOldOrders();

        $session = $request->user(); // get session

        $rows = DB::table('job_order')
            ->join('jobs','job_order.job_id','=','jobs.job_id')
            ->join('customer_detail','job_order.recruiter_id','=','customer_detail.user_id')
            ->where('job_order.freelancer_id', $session->user_id)
            ->orderBy('job_order.order_at','desc')
            ->get([
                'job_order.order_id',
                'jobs.job_title',
                'customer_detail.nama_lengkap as customer_name',
                'job_order.job_status',
                'job_order.total_price',
                'job_order.deadline_at',
            ]);

        $transformedRows = $rows->map(function ($item) {
            $price_formatted = 'Rp ' . number_format((int)$item->total_price, 0, ',', '.');
            return [
                'id'                     => $item->order_id,
                'title'                  => $item->job_title,
                'customer_name'          => $item->customer_name,
                'status'                 => $item->job_status,
                'price'                  => $price_formatted,
                'deadline_at'               => $item->deadline_at
            ];
        });

        return response()->json([
            'status'=>'success',
            'data'=>$transformedRows
        ]);
    }

    // SHARED: view order detail (customer or freelancer only)
    public function show(Request $request, string $order_id)
    {
        $this->expireOldOrders();

        $session = $request->user(); // get session

        $order = DB::table('job_order')
            ->join('jobs','job_order.job_id','=','jobs.job_id')
            ->where('job_order.order_id', $order_id)
            ->first([
                'job_order.*',
                'jobs.job_title',
                'jobs.job_desc',
            ]);

        if (!$order) {
            return response()->json(['status'=>'error','message'=>'Order not found'], 404);
        }

        // security wise: no idor for u :p
        if (!in_array($session->user_id, [$order->recruiter_id, $order->freelancer_id], true)) {
            return response()->json(['status'=>'error','message'=>'Forbidden'], 403);
        }
        $price_formatted = 'Rp ' . number_format((int)$order->total_price, 0, ',', '.');
        $transformedData = [
            "id"              => $order->order_id,
            "type"            => $order->price_type,
            "duration_amount" => $order->duration_amount,
            "order_note"      => $order->order_note,
            "status"          => $order->job_status,
            "order_at"        => $order->order_at,
            "payment_method"  => $order->payment_method,
            "total_price"     => $price_formatted,
            "deadline_at"     => $order->deadline_at,
            "title"           => $order->job_title,
            "desc"            => $order->job_desc,
        ];

        return response()->json([
            'status'=>'success',
            'data'=>$transformedData
        ]);
    }

    // FREELANCER: accept order -> job_status: On-Progress
    public function freelancerAccept(Request $request, string $order_id)
    {
        $this->expireOldOrders();

        $session = $request->user(); // get session

        $order = DB::table('job_order')->where('order_id',$order_id)->first();
        if (!$order) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Order not found',
            ], 404);
        }

        if ($order->freelancer_id !== $session->user_id) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Forbidden',
            ], 403);
        }

        // must still be in Awaiting-Payment state
        if ($order->job_status !== 'Awaiting-Payment') {
            return response()->json([
                'status'  => 'error',
                'message' => 'Order cannot be accepted in this status',
            ], 409);
        }

        // security wise: payment must already be approved by admin
        if (!$order->payment_status) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Payment not approved yet by admin',
            ], 409);
        }

        // change status & order_at
        DB::table('job_order')->where('order_id',$order_id)->update([
            'job_status' => 'On-Progress',
            'order_at'   => now(), // now means work start time
        ]);

        // email customer that freelancer accepted
        $customer = DB::table('user')->where('user_id', $order->recruiter_id)->first();
        $job      = DB::table('jobs')->where('job_id', $order->job_id)->first();

        if (!empty($customer?->email)) {
            Mail::raw(
                "Your order has been accepted.\n\n".
                "Job: ".($job->job_title ?? $order->job_id)."\n".
                "Order ID: {$order_id}\n".
                "Status: On-Progress\n",
                function ($m) use ($customer) {
                    $m->to($customer->email)
                    ->subject('Order accepted by freelancer');
                }
            );
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Order accepted (On-Progress)',
        ]);
    }

    // FREELANCER: reject order -> job_status: Canceled
    public function freelancerReject(Request $request, string $order_id)
    {
        $this->expireOldOrders();

        $session = $request->user(); // get session

        $order = DB::table('job_order')->where('order_id',$order_id)->first();
        if (!$order) return response()->json(['status'=>'error','message'=>'Order not found'], 404);

        if ($order->freelancer_id !== $session->user_id) {
            return response()->json(['status'=>'error','message'=>'Forbidden'], 403);
        }

        if ($order->job_status === 'Complete' || $order->job_status === 'Canceled') {
            return response()->json(['status'=>'error','message'=>'Order already finished'], 409);
        }

        // security wise: on-progress cannot reject by freelancer
        if ($order->payment_status && $order->job_status === 'On-Progress') {
            return response()->json([
                'status'  => 'error',
                'message' => 'This order is already approved and cannot be rejected. To cancel the order and request a refund, please contact an Administrator.',
            ], 409);
        }

        DB::table('job_order')->where('order_id',$order_id)->update([
            'job_status' => 'Canceled',
            'order_at'   => now(),
        ]);

        // trying email customer that order was cancelled
        $customer = DB::table('user')->where('user_id', $order->recruiter_id)->first();
        $job      = DB::table('jobs')->where('job_id', $order->job_id)->first();
        if (!empty($customer?->email)) {
            Mail::raw(
                "Your order has been cancelled by the freelancer.\n\n".
                "Job: ".($job->job_title ?? $order->job_id)."\n".
                "Order ID: {$order_id}\n".
                "Status: Canceled\n",
                function ($m) use ($customer) {
                    $m->to($customer->email)
                    ->subject('Order cancelled');
                }
            );
        }

        return response()->json(['status'=>'success','message'=>'Order cancelled']);
    }

    

    // CUSTOMER: confirm order complete -> job_status: Complete
    public function complete(Request $request, string $order_id)
    {
        $this->expireOldOrders();

        $session = $request->user(); // get session

        $order = DB::table('job_order')->where('order_id',$order_id)->first();
        if (!$order) return response()->json(['status'=>'error','message'=>'Order not found'], 404);

        // no idor for u :p
        if ($order->recruiter_id !== $session->user_id) {
            return response()->json(['status'=>'error','message'=>'Forbidden'], 403);
        }

        if ($order->job_status !== 'On-Progress') {
            return response()->json(['status'=>'error','message'=>'Order must be On-Progress to complete!'], 409);
        }

        DB::table('job_order')->where('order_id',$order_id)->update([
            'job_status' => 'Complete',
            'order_at'   => now(),
        ]);

        // trying email freelancer that order has been completed
        $freelancer = DB::table('user')->where('user_id', $order->freelancer_id)->first();
        $job        = DB::table('jobs')->where('job_id', $order->job_id)->first();
        if (!empty($freelancer?->email)) {
            Mail::raw(
                "Customer has marked the order as completed, GOOD JOB.\n\n".
                "Order ID: {$order_id}\n".
                "Customer: {$session->username}\n",
                function ($m) use ($freelancer, $job) {
                    $m->to($freelancer->email)
                    ->subject('Order completed ('. $job->job_title .')');
                }
            );
        }

        return response()->json(['status'=>'success','message'=>'Order marked as Complete!']);
    }

    // CUSTOMER: rating & review
    public function review(Request $request, string $order_id)
    {
        $this->expireOldOrders();
        
        $session = $request->user(); // get session

        $order = DB::table('job_order')->where('order_id',$order_id)->first();
        if (!$order) return response()->json(['status'=>'error','message'=>'Order not found'], 404);

        if ($order->recruiter_id !== $session->user_id) {
            return response()->json(['status'=>'error','message'=>'Forbidden'], 403);
        }

        if ($order->job_status !== 'Complete') {
            return response()->json(['status'=>'error','message'=>'You can only review completed orders'], 409);
        }

        $validator = Validator::make($request->all(), [
            'rating'  => ['required','integer','min:1','max:5'],
            'comment' => ['sometimes','nullable','string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'message'=>'Validation failed',
                'errors'=>$validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        // security wise: prevent multiple reviews for same job by same reviewer
        $existing = DB::table('job_ratings')
            ->where('reviewer_id', $order->recruiter_id)
            ->where('reviewer_job', $order->job_id)
            ->first();

        if ($existing) {
            return response()->json([
                'status'=>'error',
                'message'=>'You already give rating & review this job',
            ], 409);
        }

        $ratingId = (string) Str::uuid();
        DB::table('job_ratings')->insert([
            'rating_id'         => $ratingId,
            'rating_score'      => $data['rating'],
            'comment'           => $data['comment'] ?? null,
            'reviewer_id'       => $order->recruiter_id,
            'reviewer_job'      => $order->job_id,
            'created_timestamp' => now(),
        ]);

        return response()->json(['status'=>'success','message'=>'Review submitted']);
    }
}
