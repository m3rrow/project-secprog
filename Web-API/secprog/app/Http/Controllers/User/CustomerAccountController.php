<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

use App\Models\SecprogUser;
use App\Enums\AccountStatus;

class CustomerAccountController extends Controller
{
    public function view(Request $request)
    {
        /* get user_id from session */
        $session = $request->user(); // get session

        /* check if account is suspended */
        if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        /* get current customer data */
        $row = DB::table('customer_detail')
            ->where('user_id', $session->user_id)
            ->first([
                'nama_lengkap',
                'no_hp',
                'tgl_lahir',
                'alamat',
                
                'profile_photo',
                'company_name',

                'last_modified_at',
            ]);

        // get balance if exist
        $wallet = DB::table('user_wallet')
                    ->where('user_id', $session->user_id)
                    ->first(['balance']);
        if ($wallet && (float) $wallet->balance !== 0.0) {
            // Rp. 100.000 format
            $formattedBalance = number_format((float) $wallet->balance, 0, ',', '.');
            $balance = "Rp {$formattedBalance}";
        } else {
            $balance = 'no balance yet (contact admin for topup)';
        }
        return response()->json([
            'status' => 'success',
            'data' => [
                'username' => $session->username,
                'email'    => $session->email,
                'role'     => $session->role,
                'account_status' => $session->account_status,
                'balance'   => $balance,
                'detail'   => $row, // may be null if never inserted
            ],
        ]);
    }


    public function insert(Request $request)
    {
        $session = $request->user(); // get session

        /* check if account is suspended */
        if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        /* check unverified status */
        if ($session->account_status !== AccountStatus::Unverified) {
            return response()->json([
                'status'  => 'error',
                'message' => 'User already verified; use update.',
            ], 409);
        }

        // validate ALL fields required on first insert.
        $validator = Validator::make($request->all(), [
            'nama_lengkap'       => ['required','string','max:255'],
            'no_hp'              => ['required','string','max:16','regex:/^\+?[0-9\- ]{1,16}$/'],
            'tgl_lahir'          => ['required','date'],
            'alamat'             => ['required','string','max:255'],
            'company_name'       => ['required','string','max:255'],

            'profile_photo'     => ['required','file',
                        'mimes:jpg,jpeg,png',   // dev: extension check
                        'max:5120' // 5MB
            ],
        ], [
            'no_hp.regex' => 'Phone number must contain digits, space, or dashes (optional +).',
            'tgl_lahir.date' => 'tgl_lahir must in mm/dd/yyyy format.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'input validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // $php artisan storage:link (security wise, default nama file sudah diobfuscated dalam base64 format)
        $photoPath = $request->file('profile_photo')->store('user_profile_photo', 'public');

        try {
            /* converted date format */
            $tgl_lahir = Carbon::createFromFormat('m/d/Y', $request->input('tgl_lahir'))->format('Y-m-d');

            /* update */
            $payload = [
                'nama_lengkap'       => $request->input('nama_lengkap'),
                'no_hp'              => $request->input('no_hp'),
                'tgl_lahir'          => $tgl_lahir,
                'alamat'             => $request->input('alamat'),
                'company_name'       => $request->input('company_name'),

                'profile_photo'     => $photoPath,
            ];
            DB::table('customer_detail')->where('user_id', $session->user_id)->update($payload);

            /* set account_status to Pending */
            $session->account_status = AccountStatus::Pending;
            $session->save();

            return response()->json([
                'status'  => 'success',
                'message' => 'customer Information Inserted'
            ], 201);
        } catch (QueryException $e) {
            /* revert uploaded file */
            Storage::disk('public')->delete($photoPath);

            // give invalid permission error
            return response()->json([
                'status'  => 'error',
                'message' => 'error message: ' . $e->getCode(),
            ], 403);
        }
    }

    public function update(Request $request)
    {
        $session = $request->user(); // get session

        /* check if account is suspended */
        if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        /* check unverified status */
        if ($session->account_status === AccountStatus::Unverified) {
            return response()->json([
                'status'  => 'error',
                'message' => 'User is unverified; complete initial insert first.',
            ], 409);
        }

        
        // validate ALL fields required on first insert.
        $validator = Validator::make($request->all(), [
            'email'              => ['sometimes','string','email','max:255',
                                   Rule::unique('user','email')->ignore($session->user_id, 'user_id')
                                    ,'not_regex:/\+/'], // prevent + injection (optional, idk lol)

            'nama_lengkap'       => ['sometimes','nullable','string','max:255'],
            'no_hp'              => ['sometimes','nullable','string','max:16','regex:/^\+?[0-9\- ]{1,16}$/'],
            'tgl_lahir'          => ['sometimes','nullable','date'],
            'alamat'             => ['sometimes','nullable','string','max:255'],
            'company_name'       => ['sometimes','nullable','string','max:255'],

            'profile_photo'     => ['sometimes','file',
                        'mimes:jpg,jpeg,png',   // dev: extension check
                        'max:5120' // 5MB
            ],
        ], [
            'no_hp.regex' => 'phone number must contain digits, space, or dashes (optional +).',
            'tgl_lahir.date' => 'tgl_lahir must in mm/dd/yyyy format.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'input validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $payload = collect($validator->validated());

        // current file paths from DB
        $file_row = DB::table('customer_detail')
            ->where('user_id', $session->user_id)
            ->first(['profile_photo']);

        /* store new files and stage payload + remember old paths */
        $fileMap = [
            'profile_photo' => ['column' => 'profile_photo',   'dir' => 'user_profile_photo'],
        ];
        $oldPathsToDelete = [];
        foreach ($fileMap as $fkey => $fvalue) {
            if ($request->hasFile($fkey)) {
                $path = $request->file($fkey)->store($fvalue['dir'], 'public'); // new file
                $payload->put($fvalue['column'], $path);                        // set new path in DB

                // collect old path to delete later (if it exists)
                $old = $file_row?->{$fvalue['column']} ?? null;
                if ($old && $old !== $path) {
                    $oldPathsToDelete[] = $old;
                }
            }
        }

        /* if using updated but all empty */
        $email = $payload->has('email') ? mb_strtolower($payload->pull('email')) : null;
        if ($payload->isEmpty() && is_null($email)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'No fields to update',
            ], 422);
        }

        /* sql update */
        DB::transaction(function () use ($session, $email, $payload) {
            /* update email at table user */
            if (!is_null($email)) {
                $session->email = $email;
                $session->save();
            }
            
            /* update value of tgl_lahir if exist */
            /* converted date format */
            $tgl_lahir = $payload->has('tgl_lahir') ? mb_strtolower($payload->pull('tgl_lahir')) : null;
            if (!is_null($email)) {
                $payload = $payload->put('tgl_lahir', Carbon::createFromFormat('m/d/Y', $tgl_lahir)->format('Y-m-d'));
            }

            /* update table customer_detail */
            if (!$payload->isEmpty()) {
                DB::table('customer_detail')->where('user_id', $session->user_id)->update($payload->toArray());
            }
        });


        /* delete old file */
        foreach ($oldPathsToDelete as $old) {
            if (Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Customer detail updated'
        ]);
    }
}
