<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\Faktur;



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
    $fakturs = Faktur::with('distributor')
        ->whereDate('tanggal_jatuh_tempo', '>=', now())
        ->orderBy('tanggal_jatuh_tempo', 'asc')
        ->get()
        ->filter(function ($faktur) {
            return in_array($faktur->status, ['Darurat', 'Dipantau']);
        })
        ->take(5);

    return view('dashboard', compact('fakturs'));
}

}