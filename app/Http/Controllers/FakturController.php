<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use App\Models\Distributor;
use Illuminate\Http\Request;

class FakturController extends Controller
{
    public function index()
    {
        $fakturs = Faktur::with('distributor')->latest()->get();
        return view('faktur.index', compact('fakturs'));
    }



    public function create()
    {
        $distributors = Distributor::all();
        return view('faktur.create', compact('distributors'));
    }


    
    public function store(Request $request)
    {
        $request->validate([
            'distributor_id' => 'required',
            'tagihan' => 'required|numeric',
            'tanggal_faktur' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date',
        ]);

        Faktur::create($request->all());

        return redirect()->route('faktur.index')->with('success', 'Faktur berhasil ditambahkan');
    }



    public function edit(Faktur $faktur)
    {
        $distributors = Distributor::all();
        return view('faktur.edit', compact('faktur','distributors'));
    }



    public function update(Request $request, Faktur $faktur)
    {
        $request->validate([
            'distributor_id' => 'required',
            'tagihan' => 'required|numeric',
            'tanggal_faktur' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date',
        ]);

        $faktur->update($request->all());

        return redirect()->route('faktur.index')->with('success', 'Faktur berhasil diperbarui');
    }




    public function destroy(Faktur $faktur)
    {
        $faktur->delete();
        return back()->with('success', 'Faktur berhasil dihapus');
    }
}
