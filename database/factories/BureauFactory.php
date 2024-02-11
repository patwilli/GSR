<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Bureau;  
use App\Models\Agence;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agence>
 */
class BureauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected  $model = Bureau::class;

    public function definition(): array
    {
        return [
            'intitule' => $this->faker->company,
            'codeAgence' => function () {
                return Agence::inRandomOrder()->first()->id;
            },
            
        ];
    }

    
}
