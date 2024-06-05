<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('expertises', function (Blueprint $table) {
            $table->string('level', 50)->change(); // Adjust the length as needed
        });
    }
    
    public function down()
    {
        Schema::table('expertises', function (Blueprint $table) {
            $table->string('level', 20)->change(); // Revert to the original length if needed
        });
    }
    
};
