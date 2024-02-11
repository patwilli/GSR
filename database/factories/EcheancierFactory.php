<?php

namespace Database\Factories;

use App\Models\Credit;
use App\Models\Echeancier;
use Illuminate\Database\Eloquent\Factories\Factory;

class EcheancierFactory extends Factory
{
    protected $model = Echeancier::class;

    public function definition(): array
    {
        return [
            'codecredit' => function () {
                return Credit::inRandomOrder()->first()->id;
            },
            'numero_echeance' => $this->faker->numberBetween(1, 12),
            'dateEcheance' => $this->faker->date,
            'nombre_jour_retard' => $this->faker->numberBetween(0, 30),
            'montant_echeance' => $this->faker->randomFloat(2, 100, 1000),
            'montant_paye' => $this->faker->randomFloat(2, 0, 1000),
            'date_paiement' => $this->faker->optional()->date,
            'montant_impaye' => $this->faker->optional()->randomFloat(2, 0, 1000),
            'etat_echeance' => $this->faker->randomElement([
                'PAYE', 'IMPAYE', 'EN ATTENTE'
            ]),
        ];
    }
}
