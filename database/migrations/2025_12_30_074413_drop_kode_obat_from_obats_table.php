<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Remove kode_obat column.
     */
    public function up(): void
    {
        Schema::table('obats', function (Blueprint $table) {
            if (Schema::hasColumn('obats', 'kode_obat')) {
                $table->dropColumn('kode_obat');
            }
        });
    }

    /**
     * Rollback kode_obat column.
     */
    public function down(): void
    {
        Schema::table('obats', function (Blueprint $table) {
            $table->string('kode_obat')->unique()->after('id');
        });
    }
};
