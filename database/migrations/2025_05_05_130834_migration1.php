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
        Schema::create('Roles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_role')->id();
            $table->string('Nama_role');
        });

        Schema::create('User', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->id();
            $table->string('Nama_user');
            $table->string('Password');
            $table->string('Email')->unique();
            $table->foreignId('id_role')->constrained('Roles')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('Kategori', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori')->id();
            $table->string('Nama_kategori');
        });
        
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
        Schema::create('Review', function (Blueprint $table) {
            $table->id();
            $table->integer('id_review')->id();
            $table->integer('id_spot')->constrained('Spot_kuliner')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('User')->onDelete('cascade');
            $table->integer('Rating');
            $table->String('Komentar');
            $table->timestamps('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Roles');
        Schema::dropIfExists('User');
        Schema::dropIfExists('Kategori');
        Schema::dropIfExists('Spot_kuliner');
        Schema::dropIfExists('Review');
    }
};
