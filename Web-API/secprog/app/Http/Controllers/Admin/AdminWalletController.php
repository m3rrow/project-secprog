<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminWalletController extends Controller
{
    /**
     * ADMIN: topup balance for a user (no job_order link)
     * POST /api/admin/wallet/topup/{user_id}
     *  - amount (decimal/number as string, e.g. "100000" or "1.000.000")
     */
    public function topup(Request $request, string $user_id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => ['required','numeric','min:0.01'],
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>'error','errors'=>$validator->errors()], 422);
        }

        $amount = (float) $validator->validated()['amount'];

        DB::transaction(function () use ($user_id, $amount) {
            $wallet = DB::table('user_wallet')->where('user_id',$user_id)->lockForUpdate()->first();

            if (!$wallet) {
                DB::table('user_wallet')->insert([ // if not exist
                    'wallet_id' => (string) Str::uuid(),
                    'user_id'   => $user_id,
                    'balance'   => $amount,
                ]);
            } else {
                DB::table('user_wallet')->where('user_id',$user_id)->update([
                    'balance' => $wallet->balance + $amount,
                ]);
            }
        });

        return response()->json(['status'=>'success','message'=>'Topup successful']);
    }

    /**
     * ADMIN: approve job payment (transfer from recruiter -> freelancer)
     * POST /api/admin/orders/{order_id}/approve-payment
     */
    public function approveJobPayment(Request $request, string $order_id)
    {
        DB::transaction(function () use ($order_id, &$response) {
            $order = DB::table('job_order')
                ->where('order_id',$order_id)
                ->lockForUpdate()
                ->first();

            if (!$order) {
                $response = response()->json([
                    'status'  => 'error',
                    'message' => 'Order not found',
                ], 404);
                return;
            }

            if ($order->job_status !== 'Awaiting-Payment') {
                $response = response()->json([
                    'status'  => 'error',
                    'message' => 'Order not in Awaiting-Payment state',
                ], 409);
                return;
            }

            // if already paid, do nothing
            if ($order->payment_status) {
                $response = response()->json([
                    'status'  => 'error',
                    'message' => 'Payment already approved',
                ], 409);
                return;
            }

            $amount = (float) $order->total_price;

            // Lock both wallets
            $recruiterWallet  = DB::table('user_wallet')
                ->where('user_id',$order->recruiter_id)
                ->lockForUpdate()
                ->first();

            $freelancerWallet = DB::table('user_wallet')
                ->where('user_id',$order->freelancer_id)
                ->lockForUpdate()
                ->first();

            if (!$recruiterWallet || $recruiterWallet->balance < $amount) {
                $response = response()->json([
                    'status'  => 'error',
                    'message' => 'Recruiter has insufficient wallet balance',
                ], 422);
                return;
            }

            if (!$freelancerWallet) {
                DB::table('user_wallet')->insert([
                    'wallet_id' => $order->freelancer_id,
                    'user_id'   => $order->freelancer_id,
                    'balance'   => 0.00,
                ]);
                $freelancerWallet = DB::table('user_wallet')
                    ->where('user_id',$order->freelancer_id)
                    ->lockForUpdate()
                    ->first();
            }

            // Perform transfer
            DB::table('user_wallet')->where('user_id',$order->recruiter_id)->update([
                'balance' => $recruiterWallet->balance - $amount,
            ]);

            DB::table('user_wallet')->where('user_id',$order->freelancer_id)->update([
                'balance' => $freelancerWallet->balance + $amount,
            ]);

            // NEW: mark payment_status = true, but DO NOT change job_status
            DB::table('job_order')->where('order_id',$order_id)->update([
                'payment_status' => true,
            ]);

            $response = response()->json([
                'status'  => 'success',
                'message' => 'Payment approved; freelancer can now accept the order',
            ]);
        });

        return $response ?? response()->json([
            'status'  => 'error',
            'message' => 'Unknown error',
        ], 500);
    }

    // ADMIN: refund payment
    public function refundJobPayment(Request $request, string $order_id)
    {
        DB::transaction(function () use ($order_id, &$response) {
            $order = DB::table('job_order')
                ->where('order_id', $order_id)
                ->lockForUpdate()
                ->first();

            if (!$order) {
                $response = response()->json([
                    'status'  => 'error',
                    'message' => 'Order not found',
                ], 404);
                return;
            }

            // Must have been paid first
            if (!$order->payment_status) {
                $response = response()->json([
                    'status'  => 'error',
                    'message' => 'Payment has not been approved; nothing to refund',
                ], 409);
                return;
            }

            // Do not refund completed or already canceled orders
            if ($order->job_status === 'Complete' || $order->job_status === 'Canceled') {
                $response = response()->json([
                    'status'  => 'error',
                    'message' => 'Order is already finished; cannot refund here',
                ], 409);
                return;
            }

            $amount = (float) $order->total_price;

            // Lock both wallets (freelancer -> recruiter for refund)
            $freelancerWallet = DB::table('user_wallet')
                ->where('user_id', $order->freelancer_id)
                ->lockForUpdate()
                ->first();

            $recruiterWallet  = DB::table('user_wallet')
                ->where('user_id', $order->recruiter_id)
                ->lockForUpdate()
                ->first();

            if (!$freelancerWallet || $freelancerWallet->balance < $amount) {
                $response = response()->json([
                    'status'  => 'error',
                    'message' => 'Freelancer wallet has insufficient balance to refund',
                ], 422);
                return;
            }

            if (!$recruiterWallet) {
                // create wallet for customer if missing
                DB::table('user_wallet')->insert([
                    'wallet_id' => $order->recruiter_id,
                    'user_id'   => $order->recruiter_id,
                    'balance'   => 0.00,
                ]);
                $recruiterWallet = DB::table('user_wallet')
                    ->where('user_id', $order->recruiter_id)
                    ->lockForUpdate()
                    ->first();
            }

            // Reverse transfer (freelancer -> customer)
            DB::table('user_wallet')->where('user_id', $order->freelancer_id)->update([
                'balance' => $freelancerWallet->balance - $amount,
            ]);

            DB::table('user_wallet')->where('user_id', $order->recruiter_id)->update([
                'balance' => $recruiterWallet->balance + $amount,
            ]);

            // Mark as refunded/canceled
            DB::table('job_order')->where('order_id', $order_id)->update([
                'payment_status' => false,
                'job_status'     => 'Canceled',
                'order_at'       => now(), // timestamp of refund
            ]);

            $response = response()->json([
                'status'  => 'success',
                'message' => 'Payment refunded and order canceled',
            ]);
        });

        return $response ?? response()->json([
            'status'  => 'error',
            'message' => 'Unknown error',
        ], 500);
    }

}
