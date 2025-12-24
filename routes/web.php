<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
    return view('login');
})->Name('login');

Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::resource('pengguna', PenggunaController::class);

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::resource('pengguna', PenggunaController::class);});


