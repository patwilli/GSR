<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tab = ['CREDIT INVIDUEL ', 'CREDIT DE GROUPE SOLIDAIRE', 'CREDIT DE GROUPEMENT', 'CREDIT A LA CONSOMMATION', 'CREDIT AVEC EDUCATION'];
        for ($i = 0; $i < 5; $i++) {
            Produit::create([
                'libelle' => $tab[$i],
            ]);
        };
    }
}
