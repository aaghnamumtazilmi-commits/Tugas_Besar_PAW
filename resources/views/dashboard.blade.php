@extends('layouts.app')

@section('page_title', 'Dashboard')

@section('content')

<div class="bg-white rounded-2xl shadow-sm p-6 mt-10">

    <h3 class="text-navy font-semibold text-lg mb-4">
        Pembayaran Terdekat
    </h3>

    <table class="w-full text-sm text-left">
        <thead class="text-gray-500 border-b">
            <tr>
                <th class="py-3">Kode Faktur</th>
                <th class="py-3">Nama Distributor</th>
                <th class="py-3">Tagihan</th>
                <th class="py-3">Status</th>
                <th class="py-3">Tanggal Jatuh Tempo</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($fakturs as $faktur)
                <tr class="border-b last:border-none">
                    <td class="py-3">{{ $faktur->id }}</td>

                    <td class="py-3">
                        {{ $faktur->distributor->nama_distributor }}
                    </td>

                    <td class="py-3">
                        Rp {{ number_format($faktur->tagihan, 0, ',', '.') }}
                    </td>

                    <td class="py-3">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            {{ $faktur->status === 'Darurat'
                                ? 'bg-red-100 text-red-600'
                                : 'bg-orange-100 text-orange-600' }}">
                            {{ $faktur->status }}
                        </span>
                    </td>

                    <td class="py-3">
                        {{ \Carbon\Carbon::parse($faktur->tanggal_jatuh_tempo)
                            ->translatedFormat('d M Y') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-6 text-center text-gray-400">
                        Tidak ada pembayaran terdekat
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
