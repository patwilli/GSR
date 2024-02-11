<?php

namespace Database\Seeders;

use App\Models\Fonctionnalite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FonctionnaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tab = [
            'VOIR LES CREDITS', 'VOIR UN CREDIT', 'RELANCE', 'VOIR LES RAPPORTS EN COURS',
            'TELECHARGER RAPPORT', 'ANALYSER LA PERFORMANCE', 'VOIR SUBORDONNE', 'BOOSTER UN SUBORDONNE',
            'ESPACE ADMIN', 'VOIR PROFIL'
        ];
        for ($i = 0; $i < count($tab); $i++) {
            Fonctionnalite::create([
                'intitule' => $tab[$i],
            ]);
        };
    }
}
