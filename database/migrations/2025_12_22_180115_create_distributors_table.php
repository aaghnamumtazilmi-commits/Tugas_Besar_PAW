<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk menggunakan DB insert

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Membuat Struktur Tabel
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_distributor');
            $table->string('alamat');
            $table->string('kontak');
            $table->timestamps();
        });

        // 2. Memasukkan 5 Data Awal Langsung di Migration
        DB::table('distributors')->insert([
            [
                'nama_distributor' => 'PT. Rajawali Nusindo',
                'kontak' => '08123456789',
                'alamat' => 'Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
              
                'nama_distributor' => 'PT. Kimia Farma',
                'kontak' => '08123456789',
                'alamat' => 'Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_distributor' => 'PT. Penta Valent',
                'kontak' => '08123456789',
                'alamat' => 'Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_distributor' => 'PT. Bina San Prima',
                'kontak' => '08123456789',
                'alamat' => 'Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nama_distributor' => 'PT. Makmur Obat',
                'kontak' => '081234576489',
                'alamat' => 'jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};