<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        if (Auth::attempt($request->only('name', 'password'))) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('error', 'email atau password salah');
    }
   
    public function dashboard()
    {
        return view('dashboard');
    }
}