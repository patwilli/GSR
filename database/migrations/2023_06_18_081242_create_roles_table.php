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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("codeProfil");
            $table->foreign("codeProfil")->references("id")->on("profils");
            $table->unsignedBigInteger("codeFonctionnalite");
            $table->foreign("codeFonctionnalite")->references("id")->on("fonctionnalites");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
