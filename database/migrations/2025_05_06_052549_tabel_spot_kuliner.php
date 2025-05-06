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
        Schema::create('Spot_kuliner', function (Blueprint $table) {
            $table->id();
            $table->integer('id_spot')->id();
            $table->foreignId('id_user')->constrained('User')->onDelete('cascade');
            $table->foreignId('id_kategori')->constrained('Kategori')->onDelete('cascade');
            $table->string('Nama');
            $table->String('Deskripsi');
            $table->String('Lokasi');
            $table->enum('Status', ['buka','tutup']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Spot_kuliner');
    }
};
