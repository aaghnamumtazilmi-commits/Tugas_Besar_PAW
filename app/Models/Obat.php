<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'kategori',
        'stok',
        'letak_rak',
        'harga_modal',
        'harga_jual',
        'satuan_jual',
        'tanggal_masuk',
        'tanggal_kadaluarsa',
    ];
}