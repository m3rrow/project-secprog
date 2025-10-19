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

class FreelancerAccountController extends Controller
{
    public function view(Request $request)
    {
        /* get user_id from session */
        $session = $request->user(); // get session

        /* check if account is suspended */
        if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        /* get current freelancer data */
        $row = DB::table('freelancer_detail')
            ->where('user_id', $session->user_id)
            ->first([
                'nama_lengkap',
                'no_hp',
                'tgl_lahir',
                'alamat',
                
                'profile_photo',
                'file_cv',
                'file_portofolio',
                'file_ktp',

                'last_modified_at',
            ]);

        return response()->json([
            'status' => 'success',
            'data' => [
                'username' => $session->username,
                'email'    => $session->email,
                'role'     => $session->role,
                'account_status' => $session->account_status,
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

            'profile_photo'     => ['required','file',
                        'mimes:jpg,jpeg,png',   // dev: extension check
                        'max:5120' // 5MB
            ],
            'input_cv'          =>    ['required','file',
                        'mimes:pdf,doc,docx',   // dev: extension check
                        'max:10240' // 10MB
            ],
            'input_porto'        =>    ['required','file',
                        'mimes:pdf,doc,docx',   // dev: extension check
                        'max:10240' // 10MB
            ],
            'input_ktp'          => ['required','file',
                        'mimes:jpg,jpeg,png',   // dev: extension check
                        'max:8192' // 8MB
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
        $cvPath = $request->file('input_cv')->store('user_cv', 'public');
        $portoPath = $request->file('input_porto')->store('user_porto', 'public');
        $ktpPath = $request->file('input_ktp')->store('user_ktp', 'public');

        try {
            /* converted date format */
            $tgl_lahir = Carbon::createFromFormat('m/d/Y', $request->input('tgl_lahir'))->format('Y-m-d');

            /* update */
            $payload = [
                'nama_lengkap'       => $request->input('nama_lengkap'),
                'no_hp'              => $request->input('no_hp'),
                'tgl_lahir'          => $tgl_lahir,
                'alamat'             => $request->input('alamat'),

                'profile_photo'     => $photoPath,
                'file_cv'           => $cvPath,
                'file_portofolio'   => $portoPath,
                'file_ktp'          => $ktpPath,
            ];
            DB::table('freelancer_detail')->where('user_id', $session->user_id)->update($payload);

            /* set account_status to Pending */
            $session->account_status = AccountStatus::Pending;
            $session->save();

            return response()->json([
                'status'  => 'success',
                'message' => 'Freelancer Information Inserted'
            ], 201);
        } catch (QueryException $e) {
            /* revert uploaded file */
            Storage::disk('public')->delete($photoPath);
            Storage::disk('public')->delete($cvPath);
            Storage::disk('public')->delete($portoPath);
            Storage::disk('public')->delete($ktpPath);

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

            'profile_photo'     => ['sometimes','file',
                        'mimes:jpg,jpeg,png',   // dev: extension check
                        'max:5120' // 5MB
            ],
            'input_cv'          =>    ['sometimes','file',
                        'mimes:pdf,doc,docx',   // dev: extension check
                        'max:10240' // 10MB
            ],
            'input_porto'       =>    ['sometimes','file',
                        'mimes:pdf,doc,docx',   // dev: extension check
                        'max:10240' // 10MB
            ],
            'input_ktp'         => ['sometimes','file',
                        'mimes:jpg,jpeg,png',   // dev: extension check
                        'max:8192' // 8MB
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
        $file_row = DB::table('freelancer_detail')
            ->where('user_id', $session->user_id)
            ->first(['profile_photo','file_cv','file_portofolio','file_ktp']);

        /* store new files and stage payload + remember old paths */
        $fileMap = [
            'profile_photo' => ['column' => 'profile_photo',   'dir' => 'user_profile_photo'],
            'input_cv'      => ['column' => 'file_cv',         'dir' => 'user_cv'],
            'input_porto'   => ['column' => 'file_portofolio', 'dir' => 'user_porto'],
            'input_ktp'     => ['column' => 'file_ktp',        'dir' => 'user_ktp'],
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
            
            /* update table freelancer_detail */
            if (!$payload->isEmpty()) {
                DB::table('freelancer_detail')->where('user_id', $session->user_id)->update($payload->toArray());
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
            'message' => 'Freelancer detail updated'
        ]);
    }
}
