@extends('layouts.app')

@section('title','Edit Faktur')
@section('page_title','Edit Faktur')

@section('content')

<form action="{{ route('faktur.update',$faktur->id) }}" method="POST"
      class="bg-white rounded-xl shadow p-6 max-w-xl">
    @csrf
    @method('PUT')

    {{-- DISTRIBUTOR --}}
    <div class="mb-4">
        <label class="text-sm font-semibold">Distributor</label>
        <select name="distributor_id"
                class="w-full mt-1 p-3 border rounded-lg">
            @foreach($distributors as $d)
                <option value="{{ $d->id }}"
                    {{ $faktur->distributor_id == $d->id ? 'selected' : '' }}>
                    {{ $d->nama_distributor }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- TAGIHAN --}}
    <div class="mb-4">
        <label class="text-sm font-semibold">Tagihan</label>
        <input type="number" name="tagihan"
               value="{{ $faktur->tagihan }}"
               class="w-full mt-1 p-3 border rounded-lg">
    </div>

    {{-- TANGGAL --}}
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <label class="text-sm font-semibold">Tanggal Faktur</label>
            <input type="date" name="tanggal_faktur"
                   value="{{ $faktur->tanggal_faktur }}"
                   class="w-full mt-1 p-3 border rounded-lg">
        </div>

        <div>
            <label class="text-sm font-semibold">Jatuh Tempo</label>
            <input type="date" name="tanggal_jatuh_tempo"
                   value="{{ $faktur->tanggal_jatuh_tempo }}"
                   class="w-full mt-1 p-3 border rounded-lg">
        </div>
    </div>

    {{-- BUTTON --}}
    <div class="flex justify-end gap-3">
        <a href="{{ route('faktur.index') }}"
           class="px-4 py-2 rounded-lg border">
            Batal
        </a>

        <button class="bg-navy text-white px-5 py-2 rounded-lg">
            Update
        </button>
    </div>
</form>

@endsection
