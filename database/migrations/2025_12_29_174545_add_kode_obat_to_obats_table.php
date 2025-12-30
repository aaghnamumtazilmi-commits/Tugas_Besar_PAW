<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('obats', function (Blueprint $table) {
            $table->string('kode_obat')->unique()->after('id');
        });
    }

    public function down()
    {
        Schema::table('obats', function (Blueprint $table) {
            $table->dropColumn('kode_obat');
        });
    }
};
