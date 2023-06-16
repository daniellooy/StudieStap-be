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
        Schema::create('progressscores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('progressevaluation_id');
            $table->foreign('progressevaluation_id')->on('progressevaluations')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('progressrubric_id');
            $table->foreign('progressrubric_id')->on('progressrubrics')->references('id')->onDelete('cascade');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progressscores');
    }
};
