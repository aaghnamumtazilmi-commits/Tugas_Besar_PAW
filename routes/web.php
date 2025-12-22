<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', fn () => view('dashboard'));


// DAFTAR FAKTUR
use App\Http\Controllers\FakturController;

Route::prefix('faktur')->group(function () {
    Route::get('/', [FakturController::class, 'index'])->name('faktur.index');
    Route::get('/create', [FakturController::class, 'create'])->name('faktur.create');
    Route::post('/', [FakturController::class, 'store'])->name('faktur.store');
    Route::get('/{faktur}/edit', [FakturController::class, 'edit'])->name('faktur.edit');
    Route::put('/{faktur}', [FakturController::class, 'update'])->name('faktur.update');
    Route::delete('/{faktur}', [FakturController::class, 'destroy'])->name('faktur.destroy');
});
