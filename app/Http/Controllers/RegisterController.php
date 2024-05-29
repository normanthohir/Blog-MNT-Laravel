<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;


class RegisterController extends Controller
{
    public function index()
    {
        return View('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        //  return $request->all();  //tangkap semua data yang di kirim //mtampilin isinya  //mengamabil semua request

        $validateDAta = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255'
        ]);

        //  dd('Rgistrasi Berhasil'); //ini tidak akan jalan ketika yang di atas ada yang gagal  percobaan

        $validateDAta['password'] = bcrypt($validateDAta['password']); //ununtul passwordnya encripsi

        User::create($validateDAta);

        // $request->session()->flash('success','Registration successfull Please login');

        return redirect('/login')->with('success', 'Registration successfull Please login'); //kasi redirect untuk pindah ke halaman login
    }

  
}
