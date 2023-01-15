<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function view(){

        return view('login');
    }
    public function login(Request $request){

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
    public function logout(){

        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
