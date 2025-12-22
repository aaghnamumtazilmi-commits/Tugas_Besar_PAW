<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'distributor_id',
        'tagihan',
        'tanggal_faktur',
        'tanggal_jatuh_tempo',
    ];

 
    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
}
