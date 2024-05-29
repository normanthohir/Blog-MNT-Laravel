<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index() 
    {
        //file login . titik berarti masuk ke dalam index
         return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
         ]); 
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email', //:dns
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard'); //jika berhasil login maka akn masuk di dashboard
        }

        //password salam maka balik lagi ke ahalaman login
        return back()->with('LoginEror', 'Login faild');
    }

    public function logout(Request $request)
    {
        Auth::logout(); //butuuh
 
        $request->session()->invalidate(); //supaya bisa gak dipakai
     
        $request->session()->regenerateToken(); //supaya tidak di baja
     
        return redirect('/'); //balikin mau kemana
    }

}
