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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("codeAgent");
            $table->foreign("codeAgent")->references("id")->on("users");
            $table->integer('credit')->nullable();
            $table->string('message')->nullable();
            $table->string('expediteur');
            $table->string('profilExpediteur');
            $table->integer('notifier');
            $table->integer('vu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
