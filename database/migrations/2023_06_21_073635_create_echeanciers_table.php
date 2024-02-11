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
        Schema::create('echeanciers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('codecredit');
            $table->foreign('codecredit')->references('id')->on('credits');

            $table->integer('numero_echeance');
            $table->date('dateEcheance')->nullable();
            $table->integer('nombre_jour_retard')->nullable();
            $table->float('montant_echeance');
            $table->float('montant_paye')->nullable();
            $table->date('date_paiement')->nullable();
            $table->float('montant_impaye')->nullable();
            $table->string('etat_echeance')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('echeanciers');
    }
};
