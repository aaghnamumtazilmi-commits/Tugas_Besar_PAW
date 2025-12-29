<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Distributor;

class DistributorSeeder extends Seeder
{
    public function run()
    {
        Distributor::insert([
            [
                'nama_distributor' => 'PT Sehat Selalu',
                'alamat' => 'Jl. Merdeka No. 1',
                'kontak' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_distributor' => 'PT Farma Jaya',
                'alamat' => 'Jl. Sudirman No. 10',
                'kontak' => '08129876543',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    
    }
}
