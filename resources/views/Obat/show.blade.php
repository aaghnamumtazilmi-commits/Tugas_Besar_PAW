@extends('layouts.app')

@section('title','Detail Obat')
@section('page_title','Detail Obat')

@section('content')
<div class="bg-white rounded-xl p-8 shadow max-w-3xl mx-auto">

    <div class="grid grid-cols-2 gap-4 text-sm">
        <p><b>Kode Obat:</b> {{ $obat->kode_obat }}</p>
        <p><b>Nama Obat:</b> {{ $obat->nama_obat }}</p>
        <p><b>Kategori:</b> {{ $obat->kategori }}</p>
        <p><b>Stok:</b> {{ $obat->stok }}</p>
        <p><b>Letak Rak:</b> {{ $obat->letak_rak }}</p>
        <p><b>Harga Modal:</b> Rp {{ number_format($obat->harga_modal) }}</p>
        <p><b>Harga Jual:</b> Rp {{ number_format($obat->harga_jual) }}</p>
        <p><b>Satuan:</b> {{ $obat->satuan_jual }}</p>
        <p><b>Tanggal Masuk:</b> {{ $obat->tanggal_masuk }}</p>
        <p><b>Kadaluarsa:</b> {{ $obat->tanggal_kadaluarsa }}</p>
        <p>
            <b>Status:</b>
            <span class="font-semibold
                @if($obat->status=='Aman') text-green-600
                @elseif($obat->status=='Diperiksa') text-yellow-600
                @else text-red-600 @endif">
                {{ $obat->status }}
            </span>
        </p>
    </div>

    <div class="mt-8 flex justify-end">
        <a href="{{ route('obat.index') }}"
           class="px-6 py-2 bg-gray-300 rounded-lg">
            Kembali
        </a>
    </div>
</div>
@endsection
