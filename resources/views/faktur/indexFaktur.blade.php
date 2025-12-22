@extends('layouts.app')

@section('title','Daftar Faktur')
@section('page_title','Daftar Faktur')

@section('content')

<div class="flex items-center justify-between mb-6">

    {{-- TOMBOL TAMBAH --}}
    <a href="{{ route('faktur.create') }}"
       class="bg-navy text-white px-5 py-2 rounded-lg shadow hover:opacity-90">
        + Tambah Faktur
    </a>

    {{-- FILTER STATUS --}}
    <form method="GET" action="{{ route('faktur.index') }}">
        <select name="status"
                onchange="this.form.submit()"
                class="px-4 py-2 rounded-lg border border-gray-300 text-sm
                       focus:outline-none focus:ring-2 focus:ring-blue-400">

            <option value="">Semua Status</option>

            <option value="aman"
                {{ request('status') == 'aman' ? 'selected' : '' }}>
                Aman
            </option>

            <option value="dipantau"
                {{ request('status') == 'dipantau' ? 'selected' : '' }}>
                Dipantau
            </option>

            <option value="darurat"
                {{ request('status') == 'darurat' ? 'selected' : '' }}>
                Darurat
            </option>

        </select>
    </form>

</div>

<div class="bg-white rounded-xl shadow p-4">
    <table class="w-full text-sm table-fixed">
        <thead class="bg-blue-50 text-gray-700">
            <tr>
                <th class="p-3 text-left">ID Faktur</th>
                <th class="p-3 text-left">Distributor</th>
                <th class="p-3 text-left">Tagihan</th>
                <th class="p-3 text-left">Tanggal Faktur</th>
                <th class="p-3 text-left">Tanggal Jatuh Tempo</th>
                <th class="p-3 text-center w-32">Status</th>
                <th class="p-3 text-center w-32">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($fakturs as $f)
            <tr class="border-b hover:bg-blue-50/40 transition">

                <td class="p-3">
                    {{ $f->id }}
                </td>

                <td class="p-3">
                    {{ $f->distributor->nama_distributor }}
                </td>

                <td class="p-3">
                    Rp {{ number_format($f->tagihan,0,',','.') }}
                </td>

                <td class="p-3">
                    {{ $f->tanggal_faktur }}
                </td>

                <td class="p-3">
                    {{ $f->tanggal_jatuh_tempo }}
                </td>

                {{-- STATUS --}}
                <td class="p-3 text-center w-32">
                    @if($f->status == 'Darurat')
                        <span class="inline-flex items-center justify-center px-3 py-1 text-xs font-semibold rounded-full
                                     bg-red-100 text-red-600">
                            Darurat
                        </span>
                    @elseif($f->status == 'Dipantau')
                        <span class="inline-flex items-center justify-center px-3 py-1 text-xs font-semibold rounded-full
                                     bg-yellow-100 text-yellow-600">
                            Dipantau
                        </span>
                    @else
                        <span class="inline-flex items-center justify-center px-3 py-1 text-xs font-semibold rounded-full
                                     bg-green-100 text-green-600">
                            Aman
                        </span>
                    @endif
                </td>

                {{-- AKSI --}}
                <td class="p-3 text-center w-32">
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('faktur.edit',$f->id) }}"
                           class="text-blue-600 hover:underline">
                           Edit
                        </a>

                        <form method="POST" action="{{ route('faktur.destroy',$f->id) }}"
                              onsubmit="return confirm('Yakin ingin menghapus faktur ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-10 text-gray-400">
                    Belum ada data faktur
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection