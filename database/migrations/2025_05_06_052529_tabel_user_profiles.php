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
        Schema::create('UserProfil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('Users')->onDelete('cascade');
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
        Schema::dropIfExists('UserProfil');
    }
};
