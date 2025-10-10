<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $session = $request->user(); // from session

        /* check if account is suspended */
        if ($resp = $this->checkSuspended($session)) return $resp; // early return with JSON

        $validator = Validator::make($request->all(), [
            'current_password'        => ['required','string'],
            'new_password'            => ['required','string','min:8','different:current_password'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'new password must be different or password confirmation does not match',
                // 'errors'  => $validator->errors(),
            ], 422);
        }

        // verify current password
        if (!Hash::check($request->input('current_password'), $session->password)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'password invalid',
            ], 401);
        }

        // update password (+ optional pass_change_timestamp)
        $session->password = Hash::make($request->input('new_password'));
        $session->save();

        // Log out other sessions/devices (keeps current one)
        // If you store plain passwords, pass current_password here; with hashed it still works in Laravel:
        Auth::logoutOtherDevices($request->input('new_password'));

        // regenerate session ID (defense-in-depth)
        // Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'status'  => 'success',
            'message' => 'Password changed',
        ], 200);
    }
}