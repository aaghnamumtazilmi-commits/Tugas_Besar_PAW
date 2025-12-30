<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Obat extends Model
{
    use HasFactory;

    

    /**
     * Kolom yang boleh diisi melalui mass assignment
     * ID TIDAK perlu ditulis karena auto increment
     */
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

    /**
     * ===============================
     * ACCESSOR: STATUS OBAT (OTOMATIS)
     * ===============================
     * Status dihitung dari tanggal kadaluarsa
     * Tidak disimpan di database
     */
    public function getStatusAttribute()
    {
        // Hitung selisih hari dari sekarang ke tanggal kadaluarsa
        $sisaHari = Carbon::now()->diffInDays(
            Carbon::parse($this->tanggal_kadaluarsa),
            false
        );

        // Tentukan status
        if ($sisaHari < 30) {
            return 'Darurat';
        } elseif ($sisaHari <= 60) {
            return 'Diperiksa';
        }

        return 'Aman';
    }
}
