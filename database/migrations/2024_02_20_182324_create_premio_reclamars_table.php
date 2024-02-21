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
        Schema::create('premio_reclamars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario');
            $table->unsignedBigInteger('premio');
            $table->timestamps();
            $table->foreign('usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('premio')->references('id')->on('premios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premio_reclamars');
    }
};
