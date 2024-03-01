<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_pinjams', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi_pinjam');
            $table->string('kd_anggota');
            $table->date('tg_pinjam');
            $table->date('tg_bts_kembali');
            $table->string('kd_koleksi');
            $table->string('judul');
            $table->string('jns_bhn_pustaka');
            $table->string('jns_koleksi');
            $table->string('jns_media');
            $table->bigInteger('id_pengguna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pinjams');
    }
};
