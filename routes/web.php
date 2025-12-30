<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/', function(){
    return redirect()->route('login');
});

Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


Route::middleware(['auth', 'role:owner'])->prefix('pengguna')->group(function () {
    Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::put('/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
});


