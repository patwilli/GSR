<?php

namespace Database\Factories;

use App\Models\Produit;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    protected  $model = Produit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->randomElement(['CREDIT INVIDUEL ', 'CREDIT DE GROUPE SOLIDAIRE', 'CREDIT DE GROUPEMENT', 'CREDIT A LA CONSOMMATION', 'CREDIT AVEC EDUCATION']),
        ];
    }
}
