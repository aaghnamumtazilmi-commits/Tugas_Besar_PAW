@extends('layouts.app')

@section('title','Daftar Faktur')
@section('page_title','Daftar Faktur')

@section('content')

<a href="{{ route('faktur.create') }}"
   class="bg-navy text-white px-5 py-2 rounded-lg mb-4 inline-block">
   + Tambah Faktur
</a>

<div class="bg-white rounded-xl shadow p-4">
    <table class="w-full text-sm">
        <thead class="text-left bg-blue-50">
            <tr>
                <th class="p-3">ID Faktur</th>
                <th class="p-3">Distributor</th>
                <th class="p-3">Tagihan</th>
                <th class="p-3">Tanggal Faktur</th>
                <th class="p-3">Tanggal Jatuh Tempo</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakturs as $f)
            <tr class="border-b">
                <td class="p-3">{{ $faktur->id }}</td>
                <td class="p-3">{{ $f->distributor->nama_distributor }}</td>
                <td class="p-3">Rp {{ number_format($f->tagihan,0,',','.') }}</td>
                <td class="p-3">{{ $f->tanggal_faktur }}</td>
                <td class="p-3">{{ $f->tanggal_jatuh_tempo }}</td>
                <td class="p-3 flex gap-2">
                    <a href="{{ route('faktur.edit',$f->id) }}" class="text-blue-600">Edit</a>
                    <form method="POST" action="{{ route('faktur.destroy',$f->id) }}">
                        @csrf @method('DELETE')
                        <button class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection