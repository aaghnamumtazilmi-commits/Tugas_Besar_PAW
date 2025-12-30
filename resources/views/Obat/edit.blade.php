@extends('layouts.app')

@section('title','Edit Obat')
@section('page_title','Edit Obat')

@section('content')
<div class="bg-white rounded-xl p-8 shadow max-w-5xl mx-auto">

<form action="{{ route('obat.update', $obat) }}" method="POST" class="grid grid-cols-2 gap-6">
@csrf
@method('PUT')

@foreach([

    'nama_obat'=>'Nama Obat',
    'kategori'=>'Kategori',
    'stok'=>'Stok',
    'letak_rak'=>'Letak Rak',
    'harga_modal'=>'Harga Modal',
    'harga_jual'=>'Harga Jual',
    'satuan_jual'=>'Satuan Jual',
    'tanggal_masuk'=>'Tanggal Masuk',
    'tanggal_kadaluarsa'=>'Tanggal Kadaluarsa'
] as $name=>$label)

<div>
    <label class="text-sm font-medium">{{ $label }} <span class="text-red-500">*</span></label>
    <input
        type="{{ str_contains($name,'tanggal') ? 'date' : 'text' }}"
        name="{{ $name }}"
        value="{{ old($name, $obat->$name) }}"
        required
        class="border rounded-lg px-4 py-2 w-full">
</div>

@endforeach

<div class="col-span-2 flex gap-4 mt-6">
    <button class="px-6 py-2 bg-blue-600 text-white rounded-lg">
        Simpan
    </button>

    <a href="{{ route('obat.index') }}"
       class="px-6 py-2 bg-red-500 text-white rounded-lg">
        Batal
    </a>
</div>

</form>
</div>
@endsection
