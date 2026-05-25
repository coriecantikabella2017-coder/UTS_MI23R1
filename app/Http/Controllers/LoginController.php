<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // proses login
    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(auth()->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.'
        ]);
    }

    // logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}