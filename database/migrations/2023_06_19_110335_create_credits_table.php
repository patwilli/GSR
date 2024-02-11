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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("identifiantClient");
            $table->foreign("identifiantClient")->references("id")->on("clients");

            $table->unsignedBigInteger("codeAgent");
            $table->foreign("codeAgent")->references("id")->on("users");

            $table->unsignedBigInteger("codeBureau");
            $table->foreign("codeBureau")->references("id")->on("bureaus");

            $table->unsignedBigInteger("codeProduit");
            $table->foreign("codeProduit")->references("id")->on("produits");

            $table->string("objetCredit");

            $table->string("etatCredit");

            $table->date("dateDemande");

            $table->date("dateDeboursement");

            $table->date("dateInitiale");

            $table->date("derniereEcheance");

            $table->string("secteurActivite");

            $table->integer("nombreEcheance");

            $table->integer("nombreDiffereCapitale");

            $table->integer("nombreDiffereInteret");

            $table->integer("uniteDiffere");

            $table->integer("montantAccorde")->nullable();

            $table->integer("montantEligible")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
