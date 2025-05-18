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
        Schema::create('User_Profil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('Users')->unique()->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->text('bio')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('User_Profil');
    }
};
