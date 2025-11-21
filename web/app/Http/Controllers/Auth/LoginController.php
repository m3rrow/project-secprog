<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function handleLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $request->boolean('remember');

        // Check if user exists
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        
        // Check if account is locked
        if ($user && $user->isLocked()) {
            $minutesRemaining = now()->diffInMinutes($user->locked_until);
            return back()->withErrors([
                'login' => "Account temporarily locked due to multiple failed login attempts. Please try again in {$minutesRemaining} minutes.",
            ])->withInput($request->only('email'));
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Reset failed login attempts on successful login
            if ($user) {
                $user->resetFailedLoginAttempts();
            }
            
            return redirect()->intended('/');
        }
 
        // Increment failed login attempts if user exists
        if ($user) {
            $user->incrementFailedLoginAttempts();
        }

        // Generic error message for security - don't reveal if email exists or password is wrong
        return back()->withErrors([
            'login' => 'Invalid username or password.',
        ])->withInput($request->only('email'));
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}