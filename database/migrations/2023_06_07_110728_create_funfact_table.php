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
        Schema::create('funfact', function (Blueprint $table) {
            $table->id();
            $table->string('fact')->default('Als je actief bent geweest voordat je gaat leren, je hersenen dat dan ook zijn? Hierdoor kun je daadwerkelijk meer leerstof opslaan.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funfact');
    }
};
