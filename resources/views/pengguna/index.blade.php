@extends('layouts.app') 

@section('page_title', 'Data Pengguna')

@section('content')

<div class="bg-white rounded-2xl shadow-sm p-6">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-navy font-semibold text-lg">Daftar Pengguna</h3>

        <a href="{{ route('pengguna.create') }}"
           class="bg-navy text-white px-5 py-2 rounded-xl text-sm hover:opacity-90 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Pengguna
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-fixed text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="px-4 py-3 text-center">Nama</th>
                    <th class="px-4 py-3 text-center">Email</th>
                    <th class="px-4 py-3 text-center">Role</th>
                    <th class="px-4 py-5 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">
                @foreach($users as $user)
                <tr class="border-b last:border-none">
                    <td class="px-4 py-3 text-center">{{ $user->name }}</td>
                    <td class="px-4 py-3 text-center">{{ $user->email }}</td>
                    <td class="px-4 py-5 text-center">{{ $user->role }}</td>
                    <td class="px-4 py-5 text-center space-x-3">

                        <a href="{{ route('pengguna.edit', $user->id) }}"
                           class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('pengguna.destroy', $user->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus pengguna ini?')"
                                    class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
