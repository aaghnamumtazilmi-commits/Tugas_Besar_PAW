@extends('layouts.app')

@section('title','Detail Faktur')
@section('page_title','Detail Faktur')

@section('content')
<div class="bg-white rounded-xl shadow p-10">

    {{-- JUDUL --}}
    <div class="text-center mb-10">
        <h3 class="text-navy font-bold text-lg">
            Detail Faktur
        </h3>
        <p class="text-sm text-gray-400 mt-1">
            Informasi lengkap faktur (hanya dapat dilihat)
        </p>
    </div>

    {{-- FORM (READ ONLY) --}}
    <div class="grid grid-cols-2 gap-x-10 gap-y-6">
        {{-- STATUS --}}
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-2">
                Status Faktur
            </label>

            @if($faktur->status == 'Darurat')
                <span class="inline-flex items-center px-4 py-2 rounded-lg
                             bg-red-100 text-red-600 font-semibold text-sm">
                    Darurat
                </span>
            @elseif($faktur->status == 'Dipantau')
                <span class="inline-flex items-center px-4 py-2 rounded-lg
                             bg-yellow-100 text-yellow-600 font-semibold text-sm">
                    Dipantau
                </span>
            @else
                <span class="inline-flex items-center px-4 py-2 rounded-lg
                             bg-green-100 text-green-600 font-semibold text-sm">
                    Aman
                </span>
            @endif
        </div>
        
        {{-- TANGGAL FAKTUR --}}
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-2">
                Tanggal Faktur
            </label>
            <input type="date"
            value="{{ $faktur->tanggal_faktur }}"
            readonly
            class="w-full bg-gray-100 border border-gray-300 rounded-lg px-3 py-2 cursor-not-allowed">
        </div>
        
        {{-- DISTRIBUTOR --}}
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-2">
                Nama Distributor
            </label>
            <input type="text"
                   value="{{ $faktur->distributor->nama_distributor }}"
                   readonly
                   class="w-full bg-gray-100 border border-gray-300 rounded-lg px-3 py-2 cursor-not-allowed">
        </div>

        {{-- TANGGAL JATUH TEMPO --}}
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-2">
                Tanggal Jatuh Tempo
            </label>
            <input type="date"
                   value="{{ $faktur->tanggal_jatuh_tempo }}"
                   readonly
                   class="w-full bg-gray-100 border border-gray-300 rounded-lg px-3 py-2 cursor-not-allowed">
        </div>

        {{-- TAGIHAN --}}
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-2">
                Tagihan
            </label>
            <input type="text"
                   value="Rp {{ number_format($faktur->tagihan,0,',','.') }}"
                   readonly
                   class="w-full bg-gray-100 border border-gray-300 rounded-lg px-3 py-2 cursor-not-allowed">
        </div>

    </div>

    {{-- BUTTON --}}
    <div class="flex justify-end gap-4 mt-14">

        <a href="{{ route('faktur.edit', $faktur->id) }}"
           class="w-32 py-2 rounded-lg bg-navy text-white font-semibold hover:opacity-90 transition flex justify-center items-center">
            Edit
        </a>

        <a href="{{ route('faktur.index') }}"
           class="w-32 py-2 rounded-lg bg-gray-400 text-white font-semibold hover:bg-gray-500 transition flex justify-center items-center">
            Kembali
        </a>

    </div>

</div>
@endsection