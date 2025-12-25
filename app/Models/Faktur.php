<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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

    public function getStatusAttribute()
    {
        $hariIni = Carbon::today();
        $jatuhTempo = Carbon::parse($this->tanggal_jatuh_tempo);

        $sisaHari = $hariIni->diffInDays($jatuhTempo, false);

        if ($sisaHari <= 3) {
            return 'Darurat';
        } elseif($sisaHari < 14) {
            return 'Dipantau';
        } else {
            return 'Aman';
        }
    }
}
