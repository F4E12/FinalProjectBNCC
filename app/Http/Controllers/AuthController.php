<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $r){
        Session::flash('email', $r->email);
        $data = [
            'email' => $r->email,
            'password'=>$r->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('welcome');
        }else{
            return redirect('login')->withErrors('Email atau  password yang dimasukkan tidak valid');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('loginpage');
    }

    public function register(Request $r)
    {
        $r->validate([
            'name'=> [
                'required',
                'min:3',
                'max:40',
                'unique:users'
            ],
            'email' => [
                'required',
                'email',
                'ends_with:@gmail.com',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:6',
                'max:12',
            ],
            'phonenumber' => [
                'required',
                'starts_with:08'
            ],
        ],[
            'name.unique' => 'Nama ini sudah digunakan',
            'name.min' => 'Nama lengkap harus terdiri dari 3 hingga 40 karakter',
            'name.max' => 'Nama lengkap harus terdiri dari 3 hingga 40 karakter',
            'email.email' => 'Silakan masukkan alamat email yang valid',
            'email.unique' => 'Email ini sudah terdaftar',
            'email.ends_with' => 'Email harus diakhiri dengan "@gmail.com".',
            'email.not_starts_with' => 'Email tidak boleh dimulai dengan ".com".',
            'password.min' => 'Password harus terdiri dari 6 hingga 12 karakter secara inklusif.',
            'password.max' => 'Password harus terdiri dari 6 hingga 12 karakter secara inklusif.',
            'phonenumber.starts_with' => 'Nomor telepon harus dimulai dengan angka 08',
        ]);

        $data = [
            'id' => Str::uuid(),
            'name' => $r->name,
            'email' => $r->email,
            'password'=>bcrypt($r->password),
            'phonenumber'=> $r->phonenumber
        ];

        User::create($data);

        return redirect()->route('loginpage');
    }
}
