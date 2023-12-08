<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RegistrasiController extends Controller
{
    public function index():View 
    {
        return view('register.register-index');
    }

    public function register(Request $request):RedirectResponse
    {
        $validate = $request->validate([
            'email' => 'required|max:255|unique:users|email:rfc,dns',
            'name' => 'required|max:255',
            'password' => 'required|min:7|max:10'
        ]);

        User::create($validate);

        return redirect('/user')->with('berhasil', 'Registrasi Telah Berhasil');

    }
}
