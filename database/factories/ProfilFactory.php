<?php

namespace Database\Factories;

use App\Models\Profil;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil>
 */
class ProfilFactory extends Factory
{

    protected  $model = Profil::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'intitule' => $this->faker->randomElement(['administrateur', 'chef d\'agence', 'chef de bureau', 'opérationnel polyvalent']),
        ];
    }
}
