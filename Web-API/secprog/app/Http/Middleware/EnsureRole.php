<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureRole
{
    /**
     * Usage: ->middleware('role:freelancer') or 'role:freelancer,admin'
     */
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        $user = $request->user();

        // not logged in or no role? block
        if (!$user || empty($user->role)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        if (!in_array($user->role, $roles, true)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Forbidden: wrong role',
            ], 403);
        }

        return $next($request);
    }
}