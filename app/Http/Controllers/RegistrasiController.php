<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class RegistrasiController extends Controller
{
    public function index(): View 
    {
        return view('register.register-index');
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'email' => 'required|max:255|unique:users|email:rfc,dns',
            'name' => 'required|max:255',
            'password' => 'required|min:7|max:10',
            'passwordConfirm' => 'required|same:password|min:7|max:10|required_with:password'
        ]);

        $password = bcrypt($request->password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        return redirect('/login')->with('berhasil', 'Registrasi Telah Berhasil');

    }
}
