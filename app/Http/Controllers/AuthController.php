<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\Faktur;
use App\Models\Obat;




class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        if (Auth::attempt($request->only('name', 'password'))) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('error', 'email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect('/login'); 
    }
   
   public function dashboard()
{
    $fakturs = Faktur::with('distributor')
        ->whereDate('tanggal_jatuh_tempo', '>=', now())
        ->orderBy('tanggal_jatuh_tempo', 'asc')
        ->get()
        ->filter(function ($faktur) {
            return in_array($faktur->status, ['Darurat', 'Dipantau']);
        });
        

    $obats = Obat::all()
        ->filter(fn ($o) => in_array($o->status, ['Darurat', 'Diperiksa']));

    return view('dashboard', compact('fakturs', 'obats'));
    
}

}