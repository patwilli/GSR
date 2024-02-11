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
        Schema::create('bureaus', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->unsignedBigInteger("codeAgence");
            $table->foreign("codeAgence")->references("id")->on("agences");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureaus');
    }
};
