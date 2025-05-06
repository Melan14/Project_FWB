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
        Schema::dropIfExists('Review');
    }
};
