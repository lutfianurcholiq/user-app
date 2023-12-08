<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index (): View
    {
        return view('authenticate.login-index');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:7', 'max:10']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/dashboard')->with('berhasil', 'Login Berhasil');
        }

        return back()->withErrors([
            'email' => 'Email tidak sama dengan yang didaftarkan',
            'password' => 'Password yang dimasukkan tidak sesuai'
        ])->onlyInput(['email', 'password']);
    }

    public function logout (Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('berhasil', 'Berhasil Logout');
    }
}
