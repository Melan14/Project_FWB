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
        Schema::create('Favorites', function (Blueprint $table){
            $table->foreignId('user_id')->constrained('Users')->onDelete('cascade');
            $table->foreignId('spot_id')->constrained('SpotKuliner')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();

            $table->primary(['user_id', 'spot_id']);
        });

        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('Favorites'); 
    }
};
