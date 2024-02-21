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
        Schema::create('points_changes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario');
            $table->unsignedBigInteger('points');
            $table->timestamps();
            $table->foreign('usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('points')->references('id')->on('points')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points_changes');
    }
};
