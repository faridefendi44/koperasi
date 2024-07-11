<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }
    public function indexRegister()
    {
        return view('auth.register');
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'user') {
                if (Auth::user()->anggota && Auth::user()->anggota->status != '') {
                    return redirect()->intended('/users/verifikasi')->with('message', 'Berhasil Login');
                } else {
                    return redirect()->intended('/users')->with('message', 'Berhasil Login');
                }
            } elseif (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin')->with('message', 'Berhasil Login');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->intended('/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
