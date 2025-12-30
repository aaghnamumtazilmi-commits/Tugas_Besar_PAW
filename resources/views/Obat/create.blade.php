@extends('layouts.app')

@section('title','Tambah Obat')
@section('page_title','Tambah Obat')

@section('content')
<div class="bg-white rounded-xl p-8 shadow max-w-5xl mx-auto">

    {{-- PESAN ERROR --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-100 text-red-700 p-4 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ✅ TAMBAHKAN METHOD DAN ACTION -->
    <form action="{{ route('obat.store') }}" method="POST">
        @csrf
        
        {{-- NAMA OBAT --}}
        <div>
            <label class="text-sm font-medium">
                Nama Obat <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="nama_obat"
                value="{{ old('nama_obat') }}"
                required
                class="border rounded-lg px-4 py-2 w-full"
                placeholder="Masukkan nama obat">
            @error('nama_obat')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- KATEGORI --}}
        <div>
            <label class="text-sm font-medium">
                Kategori <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="kategori"
                value="{{ old('kategori') }}"
                required
                class="border rounded-lg px-4 py-2 w-full"
                placeholder="Masukkan kategori">
            @error('kategori')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- JUMLAH STOK --}}
        <div>
            <label class="text-sm font-medium">
                Jumlah Stok <span class="text-red-500">*</span>
            </label>
            <input
                type="number"
                name="stok"
                value="{{ old('stok') }}"
                required
                class="border rounded-lg px-4 py-2 w-full"
                placeholder="Masukkan jumlah stok">
            @error('stok')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- LETAK RAK --}}
        <div>
            <label class="text-sm font-medium">
                Letak Rak <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="letak_rak"
                value="{{ old('letak_rak') }}"
                required
                class="border rounded-lg px-4 py-2 w-full"
                placeholder="Masukkan letak rak">
            @error('letak_rak')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- HARGA MODAL --}}
        <div>
            <label class="text-sm font-medium">
                Harga Modal <span class="text-red-500">*</span>
            </label>
            <input
                type="number"
                name="harga_modal"
                value="{{ old('harga_modal') }}"
                required
                class="border rounded-lg px-4 py-2 w-full"
                placeholder="Masukkan harga modal">
            @error('harga_modal')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- HARGA JUAL --}}
        <div>
            <label class="text-sm font-medium">
                Harga Jual <span class="text-red-500">*</span>
            </label>
            <input
                type="number"
                name="harga_jual"
                value="{{ old('harga_jual') }}"
                required
                class="border rounded-lg px-4 py-2 w-full"
                placeholder="Masukkan harga jual">
            @error('harga_jual')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- SATUAN JUAL --}}
        <div>
            <label class="text-sm font-medium">
                Satuan Jual <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="satuan_jual"
                value="{{ old('satuan_jual') }}"
                required
                class="border rounded-lg px-4 py-2 w-full"
                placeholder="Contoh: Strip / Botol">
            @error('satuan_jual')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- TANGGAL MASUK --}}
        <div>
            <label class="text-sm font-medium">
                Tanggal Masuk <span class="text-red-500">*</span>
            </label>
            <input
                type="date"
                name="tanggal_masuk"
                value="{{ old('tanggal_masuk') }}"
                required
                class="border rounded-lg px-4 py-2 w-full">
            @error('tanggal_masuk')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- TANGGAL KADALUARSA --}}
        <div>
            <label class="text-sm font-medium">
                Tanggal Kadaluarsa <span class="text-red-500">*</span>
            </label>
            <input
                type="date"
                name="tanggal_kadaluarsa"
                value="{{ old('tanggal_kadaluarsa') }}"
                required
                class="border rounded-lg px-4 py-2 w-full">
            @error('tanggal_kadaluarsa')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- TOMBOL --}}
        <div class="col-span-2 flex justify-start gap-4 mt-6">
            <button
                type="submit"
                class="px-6 py-2 bg-navy text-white rounded-lg">
                Simpan
            </button>

            <a
                href="{{ route('obat.index') }}"
                class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">
                Batal
            </a>
        </div>

    </form>
</div>
@endsection