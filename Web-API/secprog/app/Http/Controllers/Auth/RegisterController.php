<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

use App\Models\SecprogUser;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required','string','max:32', Rule::unique('user','username')],
            'email'    => ['required','string','email','max:255', Rule::unique('user','email')
                          ,'not_regex:/\+/' // prevent + injection (optional, idk lol)
                        ], 
            'password' => ['required','string','min:8'], // tune as needed
            'role'     => ['required', Rule::in(['customer','freelancer'])], // no admin
        ]);

        /* catching error kalau input data registernya gak sesuai format (json/db) */
        if ($validator->fails()) {
            // duplicate or max
            if (($validator->errors()->get('email') || $validator->errors()->get('username')) && $validator->errors()->count()<=2) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'invalid username or email',
                ], 403);

            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'invalid input format',
                ], 400);
            }
        }

        /* catching error database lewat try-catch */
        try {
            $user = SecprogUser::create([
                'user_id'  => (string) Str::uuid(),
                'username' => mb_strtolower($request->input('username')),
                'email'    => mb_strtolower($request->input('email')),
                'password' => Hash::make($request->input('password')),
                'role'     => $request->input('role'),
                // created_timestamp & login_timestamp set by DB defaults
            ]);

            /* insert user info either to table customer or freelancer */
            DB::table($user->role . '_detail')->insert(['user_id' => $user->user_id]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Registered',
                'data'    => [
                    'id'  => $user->user_id,
                    'username' => $user->username,
                    'email'    => $user->email,
                    'role'     => $user->role,
                ],
            ], 201);

        } catch (QueryException $e) {
            // if ($e->getCode() === '23000') {
            //     return response()->json([
            //         'status'  => 'error',
            //         'message' => 'Email already exists',
            //         'errors'  => ['email' => ['The email has already been taken.']],
            //     ], 409); // Conflict
            // }

            // give invalid permission error
            return response()->json([
                'status'  => 'error',
                'message' => 'error message: ' . $e->getCode(),
            ], 403);

        } catch (\Throwable $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Unexpected server error',
            ], 500);
        }
    }
}
