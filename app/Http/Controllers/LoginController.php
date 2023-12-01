<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function user(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'nisn' => ['required', 'exists:users'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'user') {
                return redirect()->intended('/')->with('success', 'Login berhasil');
            }
            return abort(403, 'Unauthorization');
        }

        // Authentication failed, redirect back to login with an error message
        return redirect('/login')->with('error', 'Invalid credentials');
    }
    public function admin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'exists:users'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('dashboard'))->with('success', 'Login berhasil');
            }
            return abort(403, 'Unauthorization');
        }

        // Authentication failed, redirect back to login with an error message
        return redirect('/login')->with('error', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil');
    }
}
