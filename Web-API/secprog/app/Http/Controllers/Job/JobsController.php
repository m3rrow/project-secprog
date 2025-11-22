<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use App\Models\SecprogUser;
use App\Enums\AccountStatus;

class JobsController extends Controller
{
    /*
    untuk menambahkan job baru
    */
    public function create(Request $request)
    {
        $session = $request->user(); // get session

        /* check if account is suspended */
        if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        /* check unverified status */
        if ($session->account_status !== AccountStatus::Verified) {
            return response()->json([
                'status'  => 'error',
                'message' => 'This access only for Verified user only.',
            ], 409);
        }

        // validate ALL fields required on first insert.
        $validator = Validator::make($request->all(), [
            'job_title'      => ['required','string','max:128', Rule::unique('jobs','job_title')],
            'job_desc'       => ['required','string'],

            'price_type'     => ['required', Rule::in(['hour','day'])],
            'price_per_time' => ['required','string','regex:/^\d{1,3}([.,]\d{3})*|\d+$/'], // accept 1000000 OR 1.000.000 OR 1,000,000

            // // let DB default handle job_status if omitted
            // 'job_status'     => ['sometimes', Rule::in(['available','booked','unavailable'])],

            'category'       => ['required', Rule::in([
                'Red Team', 'Blue Team', 'Forensic', 'Network Pentest',
                'Code Audit', 'CTF Player', 'Mobile Pentest', 'Web Application Pentest'
            ])],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'input validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }


        try {
            $data = $validator->validated();

            // normalize: keep only digits (e.g., "1.000.000" -> "1000000")
            $priceClean = preg_replace('/\D+/', '', $data['price_per_time']);
            if ($priceClean === '' || !ctype_digit($priceClean)) {
                return response()->json(['status'=>'error','message'=>'Invalid price'], 422);
            }
 
            // built payload sql query
            $id = (string) Str::uuid();
            $payload = [
                'job_id'        => $id,
                'job_title'     => $data['job_title'],
                'job_desc'      => $data['job_desc'],
                'price_type'    => $data['price_type'],
                'price_per_time'=> (int) $priceClean,
                'category'      => $data['category'],
                'user_id'       => $session->user_id, // owner = current user
            ];

            // // Optional job_status override if provided (else DB default 'available' applies)
            // if (array_key_exists('job_status', $data)) {
            //     $payload['job_status'] = $data['job_status'];
            // }

            // Insert Data
            // your default DB is 'secprog', so plain 'jobs' works
            DB::table('jobs')->insert($payload);

            return response()->json([
                'status'  => 'success',
                'message' => "Job {$id} is created.",
                'data'    => $payload,
            ], 201);
        } catch (QueryException $e) {
            // give invalid permission error
            return response()->json([
                'status'  => 'error',
                'message' => 'error message: ' . $e->getCode(),
            ], 403);
        }
    }


    /*
    untuk mendapatkan semua list job, privilege saat ini guest atau auth
    */
    public function index(Request $request)
    {
        // $session = $request->user(); // get session

        // /* check if account is suspended */
        // if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        $validator = Validator::make($request->query(), [
            'limit' => ['sometimes','integer','min:1','max:100'],
            'sort'  => ['sometimes','in:asc,desc'],

            // optional filters:
            'offset'=> ['sometimes','integer','min:0'], // simple offset pagination
            'status'=> ['sometimes','in:available,booked,unavailable'],
            'category' => ['sometimes','in:Red Team,Blue Team,Forensic,Network Pentest,Code Audit,CTF Player,Mobile Pentest,Web Application Pentest'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message'=> 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $limit = (int)($request->query('limit', 10));
        $dir   = $request->query('sort', 'desc');
        $offset = (int) $request->query('offset', 0);

        $resp = DB::table('jobs');
        if ($request->filled('status')) {
            $resp->where('job_status', $request->query('status'));
        }
        if ($request->filled('category')) {
            $resp->where('category', $request->query('category'));
        }

        $total = (clone $resp)->count();

        $rows = $resp->orderBy('update_at', $dir)
                ->offset($offset)
                ->limit($limit)
                ->pluck('job_title', 'job_id')
                ->toArray();

        return response()->json([
            'data'   => $rows,                // { "<uuid>": "<job_title>", ... }
            'meta'   => [
                'total'  => $total,
                'limit'  => $limit,
                'offset' => $offset,
                'next_offset' => $offset + $limit < $total ? $offset + $limit : null,
            ],
        ]);
    }

    /*
    untuk mendapatkan list jobs yang dibikin sendiri oleh freelancer
    */
    public function mine(Request $request)
    {
        $session = $request->user(); // get session

        /* check if account is suspended */
        if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        // Validate query params
        $validator = Validator::make($request->query(), [
            'limit' => ['sometimes','integer','min:1','max:100'],
            'sort'  => ['sometimes','in:asc,desc'],
            'offset'=> ['sometimes','integer','min:0'], // simple offset pagination

            // optional filters:
            'status'=> ['sometimes','in:available,booked,unavailable'],
            'category' => ['sometimes','in:Red Team,Blue Team,Forensic,Network Pentest,Code Audit,CTF Player,Mobile Pentest,Web Application Pentest'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message'=> 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $limit = (int)($request->query('limit', 10));
        $dir   = $request->query('sort', 'desc');
        $offset = (int) $request->query('offset', 0);

        $resp = DB::table('jobs')->where('user_id', $session->user_id);

        if ($request->filled('status')) {
            $resp->where('job_status', $request->query('status'));
        }
        if ($request->filled('category')) {
            $resp->where('category', $request->query('category'));
        }

        $total = (clone $resp)->count();

        $rows = $resp->orderBy('update_at', $dir)
                ->offset($offset)
                ->limit($limit)
                ->pluck('job_title', 'job_id')
                ->toArray();

        return response()->json([
            'data'   => $rows,                // { "<uuid>": "<job_title>", ... }
            'meta'   => [
                'total'  => $total,
                'limit'  => $limit,
                'offset' => $offset,
                'next_offset' => $offset + $limit < $total ? $offset + $limit : null,
            ],
        ]);
    }

    /*
    untuk mendapatkan job secara specific melalui uuid, privilege saat ini guest atau auth
    */
    public function show(string $id)
    {
        $job = DB::table('jobs')->where('job_id', $id)->first();

        if (!$job) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Job not found',
            ], 404);
        }

        //formatted price ke bentuk rupiah
        $price_formatted = $job->price_per_time !== null
            ? number_format((int)$job->price_per_time, 0, ',', '.')
            : null;
        $job->price_per_time = "Rp $price_formatted";

        // cleanup output
        unset($job->job_id);

        /* dev: secure code */
        $job->job_title = e($job->job_title);
        $job->job_desc = e($job->job_desc);

        return response()->json([
            'status' => 'success',
            'data'   => $job,
        ]);
    }

    /*
    update data job by UUID (owner should be freelancer).
    */
    public function update(Request $request, string $id)
    {
        $session = $request->user(); // get session

        /* check if account is suspended */
        if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        /* check job existence */
        $job = DB::table('jobs')->where('job_id', $id)->first();
        if (!$job) {
            return response()->json(['status'=>'error','message'=>'Job not found'], 404);
        }

        /* dev: secure code (prevent idor lol) */
        if ($job->user_id !== $session->user_id) {
            return response()->json(['status'=>'error','message'=>'Forbidden IDOR'], 403);
        }

        // Validate inputs (all optional)
        $validator = Validator::make($request->all(), [
            'job_title'      => [
                'sometimes','string','max:128',
                Rule::unique('jobs','job_title'),
            ],
            'job_desc'       => ['sometimes','string'],
            'price_type'     => ['sometimes', Rule::in(['hour','day'])],
            // accept "1.000.000" or "1,000,000" as string; normalize later
            'price_per_time' => ['sometimes','string','regex:/^\d{1,3}([.,]\d{3})*|\d+$/'], // accept 1000000 OR 1.000.000 OR 1,000,000

            'job_status'     => ['sometimes', Rule::in(['available','unavailable'])],
            'category'       => ['sometimes', Rule::in([
                'Red Team', 'Blue Team', 'Forensic', 'Network Pentest',
                'Code Audit', 'CTF Player', 'Mobile Pentest', 'Web Application Pentest'
            ])],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $data = collect($validator->validated());

        /* check empty or not */
        if ($data->isEmpty()) {
            return response()->json(['status'=>'error','message'=>'No fields to update'], 422);
        }

        // normalize price "1.000.000" -> 1000000 (int as string)
        if ($data->has('price_per_time')) {
            $clean = preg_replace('/\D+/', '', (string)$data->get('price_per_time'));
            if ($clean === '' || !ctype_digit($clean)) {
                return response()->json(['status'=>'error','message'=>'Invalid price'], 422);
            }
            $data->put('price_per_time', (int)$clean);
        }

        /* update */
        DB::table('jobs')->where('job_id', $id)->update($data->toArray());


        return response()->json([
            'status'  => 'success',
            'message' => 'Job updated',
            'data'    => "Job {$id} successfully updated.",
        ]);
    }

    public function delete(Request $request, string $id)
    {
        $session = $request->user(); // get session

        $job = DB::table('jobs')->where('job_id', $id)->first();

        if (!$job) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Job not found',
            ], 404);
        }

        // security wise, ensure this job belongs to the current freelancer
        if ($job->user_id !== $session->user_id) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You are not the owner of this job',
            ], 403);
        }

        // security wise, prevent deleting jobs that are already booked / in use
        if ($job->job_status !== 'available') {
            return response()->json([
                'status'  => 'error',
                'message' => 'Only available jobs can be deleted',
            ], 409);
        }

        DB::table('jobs')->where('job_id', $id)->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'Job deleted successfully',
        ]);
    }
}
