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
        Schema::create('SpotKuliner', function (Blueprint $table) {
            $table->id();
            $table->integer('spot_id')->id();
            $table->foreignId('user_id')->constrained('Users')->onDelete('cascade');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->String('lokasi');
            $table->enum('status', ['buka','tutup']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SpotKuliner');
    }
};
