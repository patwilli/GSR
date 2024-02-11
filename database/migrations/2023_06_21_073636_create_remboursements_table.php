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
        Schema::create('remboursements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("codeCredit");
            $table->foreign("codeCredit")->references("id")->on("credits");

            $table->unsignedBigInteger("codeBureau");
            $table->foreign("codeBureau")->references("id")->on("bureaus");

            $table->float("soldeCredit");

            $table->string("etatCredit");

            $table->float("montantTotalPayeCredit");

            $table->float("montantPayeCredit");

            $table->date("dateRemboursement");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remboursements');
    }
};
