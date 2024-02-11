<?php

namespace Database\Factories;

use App\Models\Remboursement;
use App\Models\Credit;
use App\Models\Bureau;
use Illuminate\Database\Eloquent\Factories\Factory;

class RemboursementFactory extends Factory
{
    protected $model = Remboursement::class;

    public function definition(): array
    {
        return [
            'codeCredit' => function () {
                return Credit::inRandomOrder()->first()->id;
            },
            'codeBureau' => function () {
                return Bureau::inRandomOrder()->first()->id;
            },
            'soldeCredit' => $this->faker->randomFloat(2, 100, 1000),
            'etatCredit' => $this->faker->randomElement(['SAINT', 'IMMOBILISE', 'PERTE', 'CONTENTIEUX', 'SOLDE']),
            'montantTotalPayeCredit' => $this->faker->randomFloat(2, 0, 300000),
            'montantPayeCredit' => $this->faker->randomFloat(2, 0, 25000),
            'dateRemboursement' => $this->faker->date,
        ];
    }
}
