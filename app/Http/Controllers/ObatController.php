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
        $obats = Obat::latest()->get();

        if ($request->search) {
            $obats = $obats->filter(fn ($o) =>
                str_contains(strtolower($o->nama_obat), strtolower($request->search))
            );
        }

        if ($request->status) {
            $obats = $obats->filter(fn ($o) => $o->status === $request->status);
        }

        return view('obat.index', compact('obats'));
    }

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

        return redirect()->route('obat.index')
            ->with('success', 'Obat berhasil ditambahkan');
    }

    public function show(Obat $obat)
    {
        return view('obat.show', compact('obat'));
    }

    public function edit(Obat $obat)
    {
        return view('obat.edit', compact('obat'));
    }

    // =========================
    // UPDATE OBAT
    // =========================
    public function update(Request $request, Obat $obat)
    {
        $this->validateObat($request, $obat->id);

        $obat->update($request->all());

        return redirect()->route('obat.index')
            ->with('success', 'Obat berhasil diperbarui');
    }

    // =========================
    // HAPUS OBAT
    // =========================
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obat.index')
            ->with('success', 'Obat berhasil dihapus');
    }

    // =========================
    // VALIDASI (DIPAKAI ULANG)
    // =========================
    private function validateObat(Request $request, $id = null)
    {
        $request->validate(
            [
                'kode_obat' => 'required|unique:obats,kode_obat,' . $id,
                'nama_obat' => 'required',
                'kategori' => 'required',
                'stok' => 'required|integer',
                'letak_rak' => 'required',
                'harga_modal' => 'required|numeric',
                'harga_jual' => 'required|numeric',
                'satuan_jual' => 'required',
                'tanggal_masuk' => 'required|date',
                'tanggal_kadaluarsa' => 'required|date',
            ],
            [
                'required' => 'Data wajib diisi',
                'kode_obat.unique' => 'Kode obat sudah digunakan',
            ]
        );
    }
}
