@extends('layouts.app')

@section('page_title', 'Edit Pengguna')

@section('content')
<div class="flex justify-center">
<div class="bg-white rounded-2xl shadow-sm p-8 max-w-3xl w-full">

<form action="{{ route('pengguna.update', $user->id) }}" method="POST" class="space-y-5">
@csrf
@method('PUT')

<div>
    <label>Nama</label>
    <input name="name" value="{{ $user->name }}" class="w-full border rounded-xl p-2" required>
</div>

<div>
    <label>Email</label>
    <input name="email" value="{{ $user->email }}" class="w-full border rounded-xl p-2" required>
</div>

<div>
    <label>Password (Opsional)</label>
    <input type="password" name="password" class="w-full border rounded-xl p-2">
</div>

<div>
    <label>Role</label>
    <select name="role" class="w-full border rounded-xl p-2">
        <option value="owner" {{ $user->role=='owner'?'selected':'' }}>Owner</option>
        <option value="staff" {{ $user->role=='staff'?'selected':'' }}>Staff</option>
    </select>
</div>

<div class="flex justify-end gap-3">
    <button class="bg-navy text-white px-6 py-2 rounded-xl">Simpan</button>
    <a href="{{ route('pengguna.index') }}" class="px-5 py-2 border rounded-xl">Batal</a>
</div>

</form>
</div>

@endsection
