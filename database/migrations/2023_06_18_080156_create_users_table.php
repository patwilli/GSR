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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('login')->unique();
            $table->unsignedBigInteger("codeBureau")->nullable();
            $table->foreign("codeBureau")->references("id")->on("bureaus");
            $table->unsignedBigInteger("codeAgence")->nullable();
            $table->foreign("codeAgence")->references("id")->on("agences");
            $table->unsignedBigInteger("codeProfil");
            $table->foreign("codeProfil")->references("id")->on("profils");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('bloque')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
