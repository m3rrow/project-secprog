<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function handleRegister(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'birthdate' => ['required', 'date'],
            'password' => ['required', 'min:8'],
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        Auth::login($user);

        return redirect()->intended('/');
    }
}