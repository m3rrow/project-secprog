<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        /* input validator */
        $validator = Validator::make($request->all(), [
            'login'    => ['required','string','max:255'],
            'password' => ['required','string'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        } else {
            /* get user input if input validation not failed */
            $login = mb_strtolower($request->input('login'));
            $password = $request->input('password');
        }
        
        /* autentikasi berdasarkan email/username + password */
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (!Auth::attempt([$field => $login, 'password' => $password])) {
            return response()->json([
                'status'  => 'error',
                'message' => 'invalid credentials',
            ], 401);
        }

        // prevent session fixation
        $request->session()->regenerate();

        // update user->login_timestamp
        $user = Auth::user();
        DB::table('user')
            ->where('user_id', $user->user_id)
            ->update(['login_timestamp' => DB::raw('CURRENT_TIMESTAMP')]);

        
        return response()->json([
            'status'  => 'success',
            'message' => 'Logged in',
            // 'data'    => [
                // 'user_id'  => $user->user_id,
                // 'username' => $user->username,
                // 'email'    => $user->email,
                // 'role'     => $user->role,
            // ],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'status'  => 'success',
            'message' => 'Logged out',
        ]);
    }
}
