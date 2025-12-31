@extends('layouts.app')

@section('title','Daftar Obat')
@section('page_title','Daftar Obat')

@section('content')
<div class="bg-white rounded-xl p-6 shadow">

    {{-- ===================== --}}
    {{-- ACTION BAR --}}
    {{-- ===================== --}}
    <div class="flex items-center justify-between mb-6">

        {{-- TOMBOL TAMBAH OBAT --}}
        <a href="{{ route('obat.create') }}"
           class="bg-navy text-white px-5 py-2 rounded-lg flex items-center gap-2">
            <i class="fas fa-plus"></i>
            Tambah Obat
        </a>

        {{-- FILTER & SEARCH --}}
        <form method="GET" class="flex items-center gap-4">

            {{-- FILTER STATUS --}}
            <select name="status"
                    onchange="this.form.submit()"
                    class="border rounded-lg px-4 py-2 text-sm">
                <option value="">Semua</option>
                @foreach(['Aman','Diperiksa','Darurat'] as $s)
                    <option value="{{ $s }}" {{ request('status')==$s ? 'selected' : '' }}>
                        {{ $s }}
                    </option>
                @endforeach
            </select>

            {{-- SEARCH --}}
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari Obat"
                       class="border rounded-lg pl-10 pr-4 py-2 text-sm w-56">
            </div>

            <button class="hidden"></button>
        </form>
    </div>

    {{-- ===================== --}}
    {{-- TABEL DATA OBAT --}}
    {{-- ===================== --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm table-fixed">

            {{-- HEADER TABEL --}}
            <thead>
                <tr class="border-b text-gray-500">
                    <th class="py-3 text-center">ID Obat</th>
                    <th class="text-left">Nama Obat</th>
                    <th class="text-left">Kategori</th>
                    <th class="text-center whitespace-nowrap">Tanggal Masuk</th>
                    <th class="text-center">Status</th>
                    <th class="text-center whitespace-nowrap">Tanggal Kadaluarsa</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            {{-- BODY --}}
            <tbody>
            @forelse($obats as $obat)

                @php
                    $warna = match($obat->status) {
                        'Aman' => 'bg-green-100 text-green-700',
                        'Diperiksa' => 'bg-yellow-100 text-yellow-700',
                        default => 'bg-red-100 text-red-700'
                    };
                @endphp

                <tr class="border-b hover:bg-blue-50">

                    {{-- ID --}}
                    <td class="py-3 text-center font-semibold">
                        {{ $obat->id }}
                    </td>

                    {{-- NAMA --}}
                    <td class="truncate">
                        {{ $obat->nama_obat }}
                    </td>

                    {{-- KATEGORI --}}
                    <td>
                        {{ $obat->kategori }}
                    </td>

                    {{-- TANGGAL MASUK --}}
                    <td class="text-center whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($obat->tanggal_masuk)->format('d-m-Y') }}
                    </td>

                    {{-- STATUS --}}
                    <td class="text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $warna }}">
                            {{ $obat->status }}
                        </span>
                    </td>

                    {{-- KADALUARSA --}}
                    <td class="text-center whitespace-nowrap text-gray-700">
                        {{ \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->format('d-m-Y') }}
                    </td>

                    {{-- AKSI --}}
                    <td class="text-center">
                        <div class="flex justify-center gap-4 text-lg">
                            <a href="{{ route('obat.show',$obat) }}"
                               class="text-gray-600 hover:text-navy">
                                <i class="far fa-eye"></i>
                            </a>

                            <a href="{{ route('obat.edit',$obat) }}"
                               class="text-blue-600 hover:text-blue-800">
                                <i class="far fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('obat.destroy',$obat) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus obat ini?')"
                                        class="text-red-500 hover:text-red-700">
                                    <i class="far fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

            @empty
                {{-- DATA KOSONG --}}
                <tr>
                    <td colspan="7" class="text-center text-gray-400 py-12">
                        Data obat belum tersedia.
                    </td>
                </tr>
            @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection
