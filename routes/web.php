<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\DistributorController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return redirect()->route('login');
});

Route::get('/login', function(){
    return view('login');
})->name('login');


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



Route::prefix('faktur')->group(function () {
    Route::get('/', [FakturController::class, 'index'])->name('faktur.index');
    Route::get('/create', [FakturController::class, 'create'])->name('faktur.create');
    Route::post('/', [FakturController::class, 'store'])->name('faktur.store');
    Route::get('/{faktur}/show', [FakturController::class, 'show'])->name('faktur.show');
    Route::get('/{faktur}/edit', [FakturController::class, 'edit'])->name('faktur.edit');
    Route::put('/{faktur}', [FakturController::class, 'update'])->name('faktur.update');
    Route::delete('/{faktur}', [FakturController::class, 'destroy'])->name('faktur.destroy');
});


// Route::get('/', function () {
//     return redirect()->route('distributors.index');
// });

// Route::resource('distributors', DistributorController::class);

Route::prefix('distributors')->group(function () {
    Route::get('/', [DistributorController::class, 'index'])->name('distributors.index');
    Route::get('/create', [DistributorController::class, 'create'])->name('distributors.create');
    Route::post('/', [DistributorController::class, 'store'])->name('distributors.store');
    Route::get('/{distributor}/edit', [DistributorController::class, 'edit'])->name('distributors.edit');
    Route::put('/{distributor}', [DistributorController::class, 'update'])->name('distributors.update');
    Route::delete('/{distributor}', [DistributorController::class, 'destroy'])->name('distributors.destroy');
});