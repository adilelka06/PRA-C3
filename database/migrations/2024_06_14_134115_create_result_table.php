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
    Schema::create('results', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tournement_id')->constrained();
        $table->foreignId('team1_id')->constrained('teams');
        $table->foreignId('team2_id')->constrained('teams');
        $table->integer('team1_score');
        $table->integer('team2_score');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result');
    }
};
