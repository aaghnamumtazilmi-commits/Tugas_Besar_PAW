<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Faktur;
use App\Models\Distributor;
use Illuminate\Http\Request;

class FakturController extends Controller
{

    public function index(Request $request)
    {
        $today = Carbon::today();

        $query = Faktur::with('distributor');

        if ($request->status == 'darurat') {
            $query->whereDate('tanggal_jatuh_tempo', '<=', $today);
        }

        if ($request->status == 'dipantau') {
            $query->whereBetween('tanggal_jatuh_tempo', [
                $today->copy()->addDay(),
                $today->copy()->addDays(7)
            ]);
        }

        if ($request->status == 'aman') {
            $query->whereDate('tanggal_jatuh_tempo', '>', $today->copy()->addDays(7));
        }

        $fakturs = $query
            ->orderBy('created_at', 'asc')
            ->get();

        return view('faktur.indexFaktur', compact('fakturs'));
    }



    public function create()
    {
        $distributors = Distributor::all();
        return view('faktur.createFaktur', compact('distributors'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'distributor_id' => 'required',
            'tagihan' => 'required|numeric',
            'tanggal_faktur' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date',
        ]);

        Faktur::create([
            'distributor_id' => $request->distributor_id,
            'tagihan' => $request->tagihan,
            'tanggal_faktur' => $request->tanggal_faktur,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo
        ]);

        return redirect()->route('faktur.index')->with('success', 'Faktur berhasil ditambahkan');
    }



    public function edit(Faktur $faktur)
    {
        $faktur = Faktur::findOrFail($faktur->id);
        $distributors = Distributor::all();
        return view('faktur.editFaktur', compact('faktur','distributors'));
    }



    public function update(Request $request, Faktur $faktur)
    {
        $request->validate([
            'distributor_id' => 'required',
            'tagihan' => 'required|numeric',
            'tanggal_faktur' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date',
        ]);

        $faktur = Faktur::findOrFail($faktur->id);
        $faktur->update($request->all());

        return redirect()->route('faktur.index')->with('success', 'Faktur berhasil diperbarui');
    }




    public function destroy(Faktur $faktur)
    {
        Faktur::findOrFail($faktur->id);
        $faktur->delete();
        return back()->with('success', 'Faktur berhasil dihapus');
    }
}
