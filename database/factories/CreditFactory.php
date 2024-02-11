<?php

namespace Database\Factories;

use App\Models\Bureau;
use App\Models\Credit;
use App\Models\Client;
use App\Models\Fond;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditFactory extends Factory
{
    protected $model = Credit::class;

    public function definition(): array
    {
        return [
            'identifiantClient'
            => function () {
                return User::inRandomOrder()->first()->id;
            },
            'codeAgent' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'codeBureau' => function () {
                return Bureau::inRandomOrder()->first()->id;
            },
            'codeProduit' => function () {
                return Produit::inRandomOrder()->first()->id;
            },
            'objetCredit' => $this->faker->sentence,
            'etatCredit' => $this->faker->randomElement(['SAINT', 'IMMOBILISE', 'PERTE', 'CONTENTIEUX', 'SOLDE']),
            'dateDemande' => $this->faker->date,
            'dateDeboursement' => $this->faker->date,
            'dateInitiale' => $this->faker->date,
            'derniereEcheance' => $this->faker->date,
            'secteurActivite' => $this->faker->word,
            'nombreEcheance' => $this->faker->numberBetween(1, 12),
            'nombreDiffereCapitale' => $this->faker->numberBetween(0, 3),
            'nombreDiffereInteret' => $this->faker->numberBetween(0, 3),
            'uniteDiffere' => $this->faker->numberBetween(1, 12),
            'montantAccorde' => $this->faker->numberBetween(1000, 100000),
            'montantEligible' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
