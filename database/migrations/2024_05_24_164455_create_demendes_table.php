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
        Schema::create('demendes', function (Blueprint $table) {
            $table->id();
            $table->enum('reponse',["en cours", "false","true"]);
            $table->foreignId('offre_id')->constrained(); 
            $table->foreignId('candidat_id')->constrained(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demendes');
    }
};
