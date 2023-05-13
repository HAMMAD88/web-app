<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentication passed
            return redirect()->intended('/movies');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->withInput($request->except('password'));
    }
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle the registration request
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
