<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /** Tampilkan daftar distributor */
    public function index(Request $request)
    {
        // Pencarian sederhana (opsional)
        $q = $request->get('q', '');

        $distributors = Distributor::query()
            ->when($q, function ($query) use ($q) {
                $query->where('nama_distributor', 'like', "%{$q}%")
                      ->orWhere('kontak', 'like', "%{$q}%")
                      ->orWhere('alamat', 'like', "%{$q}%");
            })
            ->orderBy('nama_distributor')
            ->paginate(10);

        return view('distributors.index', compact('distributors', 'q'));
    }

    /** Tampilkan form tambah */
    public function create()
    {
        // Jika ingin auto‑generate kode tampil di form (opsional)
        $lastId = optional(Distributor::latest('id')->first())->id ?? 0;
        $kode   = 'DTR' . date('Y') . '-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        return view('distributors.create', compact('kode'));
    }

    /** Simpan data baru (INSERT) */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'kontak'           => 'required|string|max:50',
            'alamat'           => 'required|string|max:255',
            'kode_distributor' => 'nullable|string|max:50', // opsional
        ]);

        Distributor::create($validated);

        return redirect()
            ->route('distributors.index')
            ->with('success', 'Distributor berhasil ditambahkan.');
    }

    /** Tampilkan form edit */
    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributors.edit', compact('distributor'));
    }

    /** Update data (UPDATE) */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'kontak'           => 'required|string|max:50',
            'alamat'           => 'required|string|max:255',
            'kode_distributor' => 'nullable|string|max:50',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($validated);

        return redirect()
            ->route('distributors.index')
            ->with('success', 'Distributor berhasil diperbarui.');
    }

    /** Hapus data (DELETE) */
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();

        return redirect()
            ->route('distributors.index')
            ->with('success', 'Distributor berhasil dihapus.');
    }
}
