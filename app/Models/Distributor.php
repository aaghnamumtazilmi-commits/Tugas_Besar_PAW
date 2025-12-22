<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_distributor',
        'alamat',
        'kontak',
    ];

    // Relasi: 1 Distributor punya banyak Faktur
    public function fakturs()
    {
        return $this->hasMany(Faktur::class);
    }
}
