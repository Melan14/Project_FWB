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
            $table->foreignId('id_user')->constrained('Users')->onDelete('cascade');
            $table->foreignId('id_spot')->constrained('Spot_kuliners')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();

            $table->primary(['id_user', 'id_spot']);
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
