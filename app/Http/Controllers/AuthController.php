<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function view(){

        return view('login');
    }
    public function login(){

        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required','min:8'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('beranda');
        }
        return back()->with('loginError','Login Gagal');
    }
}
