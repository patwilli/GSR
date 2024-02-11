<?php

namespace Database\Factories;

use App\Models\Fonctionnalite;
use App\Models\Profil;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codeProfil' => function () {
                return Profil::inRandomOrder()->first()->id;
            },
            'codeFonctionnalite' => function () {
                return Fonctionnalite::inRandomOrder()->first()->id;
            },
        ];
    }
}
