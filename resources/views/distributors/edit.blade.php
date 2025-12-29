
@extends('layouts.app')
@section('title', 'Ubah Distributor')

@section('content')
<style>
  /* ====== STYLE RINGAN (tidak mengubah CSS global tim) ====== */
  .ds-wrap { margin-top:12px; }
  .ds-card { background:#fff; border-radius:12px; box-shadow:0 6px 18px rgba(0,0,0,.06); padding:24px; }

  .ds-title    { text-align:center; margin-bottom:4px; color:#24486f; font-weight:700; font-size:20px; }
  .ds-subtitle { text-align:center; color:#6b86a8; font-size:14px; margin-bottom:18px; }

  /* Grid 2 kolom (lebih mirip gambar 2) */
  .ds-form-grid {
    display:grid;
    grid-template-columns: 1fr 1fr; /* dua kolom */
    gap:16px 20px;                  /* baris x kolom */
    margin-bottom:20px;
  }
  .ds-field label { display:block; font-weight:600; color:#3a5577; margin-bottom:8px; }
  .ds-req { color:#e53935; }

  .ds-input, .ds-textarea {
    width:100%; border:1px solid #dfe3e8; border-radius:8px; background:#f5f9ff;
    padding:10px 12px; color:#2a3b56;
  }
  .ds-input:focus, .ds-textarea:focus {
    outline:none; border-color:#1e88e5; box-shadow:0 0 0 3px rgba(30,136,229,.12);
  }
  .ds-textarea { min-height:42px; resize:vertical; }
  .ds-field.full { grid-column: 1 / span 2; } /* alamat full width */

  /* Tombol aksi (kanan bawah) */
  .ds-actions { display:flex; justify-content:flex-end; gap:12px; }
  .ds-btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:10px 16px;
            border-radius:8px; text-decoration:none; border:none; cursor:pointer; font-weight:600; }
  .ds-btn-primary { background:#1e88e5; color:#fff; }
  .ds-btn-primary:hover { background:#176fbe; color:#fff; }
  .ds-btn-danger { background:#d32f2f; color:#fff; }
  .ds-btn-danger:hover { background:#b71c1c; color:#fff; }

  @media (max-width: 768px) {
    .ds-form-grid { grid-template-columns: 1fr; }
    .ds-field.full { grid-column:auto; }
  }
</style>

<h4 class="mb-2">Distributor</h4>

<div class="ds-wrap">
  <div class="ds-card">
    <div class="ds-title">Formulir Edit Distributor</div>
    <div class="ds-subtitle">Pastikan seluruh informasi terisi dengan lengkap dan akurat</div>

    <!-- FORM EDIT: method PUT ke route update -->
    <form action="{{ route('distributors.update', $distributor->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="ds-form-grid">
        <!-- Kolom kiri -->
        <div class="ds-field">
          <label for="nama_distributor">Nama Distributor <span class="ds-req">*</span></label>
          <input
            type="text"
            id="nama_distributor"
            name="nama_distributor"
            class="ds-input"
            value="{{ old('nama_distributor', $distributor->nama_distributor) }}"
            placeholder="Masukkan nama distributor"
            required
          >
          @error('nama_distributor') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Kolom kanan -->
        <div class="ds-field">
          <label for="kontak">Kontak <span class="ds-req">*</span></label>
          <input
            type="text"
            id="kontak"
            name="kontak"
            class="ds-input"
            value="{{ old('kontak', $distributor->kontak) }}"
            placeholder="Nomor telepon/HP"
            required
          >
          @error('kontak') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Alamat full width (baris bawah) -->
        <div class="ds-field full">
          <label for="alamat">Alamat <span class="ds-req">*</span></label>
          <input
            type="text"
            id="alamat"
            name="alamat"
            class="ds-input"
            value="{{ old('alamat', $distributor->alamat) }}"
            placeholder="Kota/Kabupaten, Provinsi"
            required
          >
          @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
      </div>

      <div class="ds-actions">
        <button type="submit" class="ds-btn ds-btn-primary">Simpan</button>
        <a href="{{ route('distributors.index') }}" class="ds-btn ds-btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection
