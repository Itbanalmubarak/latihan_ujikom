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
        Schema::create('koleksis', function (Blueprint $table) {
            $table->id();
            $table->string('kd_koleksi');
            $table->string('judul');
            $table->string('jns_bhn_pustaka');
            $table->string('jns_koleksi');
            $table->string('jns_media');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('tahun');
            $table->string('cetakan');
            $table->string('edisi');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksis');
    }
};
