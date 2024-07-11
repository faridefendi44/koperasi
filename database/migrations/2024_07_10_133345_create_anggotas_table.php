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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('id_anggota');
            $table->string('nip');
            $table->string('golongan');
            $table->double('gaji');
            $table->string('bidang');
            $table->string('alamat');
            $table->string('no_wa');
            $table->double('simpanan');
            $table->string('tanggal_masuk');
            $table->string('status')->default('proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
