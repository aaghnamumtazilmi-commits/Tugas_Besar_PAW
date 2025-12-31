<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // =========================
    // DAFTAR OBAT
    // =========================
    public function index(Request $request)
    {
        // Ambil semua obat, urut terbaru
        $obats = Obat::orderBy('id','asc')->get();

        // 🔍 SEARCH nama obat (collection)
        if ($request->filled('search')) {
            $obats = $obats->filter(fn ($o) =>
                str_contains(
                    strtolower($o->nama_obat),
                    strtolower($request->search)
                )
            );
        }

        // 🏷️ FILTER status (pakai accessor getStatusAttribute)
        if ($request->filled('status')) {
            $obats = $obats->filter(fn ($o) =>
                $o->status === $request->status
            );
        }

        return view('obat.index', compact('obats'));
    }

    // =========================
    // FORM TAMBAH OBAT
    // =========================
    public function create()
    {
        return view('obat.create');
    }

    // =========================
    // SIMPAN OBAT
    // =========================
    public function store(Request $request)
    {
        $this->validateObat($request);

        Obat::create($request->all());

        return redirect()
            ->route('obat.index')
            ->with('success', 'Obat berhasil ditambahkan');
    }

    // =========================
    // DETAIL OBAT
    // =========================
    public function show(Obat $obat)
    {
        return view('obat.show', compact('obat'));
    }

    // =========================
    // FORM EDIT OBAT
    // =========================
    public function edit(Obat $obat)
    {
        return view('obat.edit', compact('obat'));
    }

    // =========================
    // UPDATE OBAT
    // =========================
    public function update(Request $request, Obat $obat)
    {
        $this->validateObat($request);

        $obat->update($request->all());

        return redirect()
            ->route('obat.index')
            ->with('success', 'Obat berhasil diperbarui');
    }

    // =========================
    // HAPUS OBAT
    // =========================
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()
            ->route('obat.index')
            ->with('success', 'Obat berhasil dihapus');
    }

    // =========================
    // VALIDASI (DIPAKAI ULANG)
    // =========================
    private function validateObat(Request $request)
    {
        $request->validate(
            [
                'nama_obat'           => 'required',
                'kategori'            => 'required',
                'stok'                => 'required|integer',
                'letak_rak'           => 'required',
                'harga_modal'         => 'required|numeric',
                'harga_jual'          => 'required|numeric',
                'satuan_jual'         => 'required',
                'tanggal_masuk'       => 'required|date',
                'tanggal_kadaluarsa'  => 'required|date',
            ],
            [
                'required' => 'Data wajib diisi',
            ]
        );
    }
}
