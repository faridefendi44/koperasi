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
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();
            $table->string('id_angsuran');
            $table->string('id_pinjaman');
            $table->string('id_anggota');
            $table->string('tanggal_angsuran');
            $table->double('angsuran_pokok')->nullable();
            $table->double('bunga')->nullable();
            $table->double('jumlah_sisa')->nullable();
            $table->double('total_angsuran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angsurans');
    }
};
