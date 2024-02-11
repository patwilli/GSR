<?php

namespace Database\Factories;

use App\Models\Agence;
use App\Models\Bureau;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agence>
 */
class AgenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected  $model = Agence::class;


    public function definition(): array
    {
        return [
            'intitule' => $this->faker->city(),
        ];
    }
}
