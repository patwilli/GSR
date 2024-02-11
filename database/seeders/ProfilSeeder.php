<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tab = ['ADMINISTRATEUR', 'CHEF AGENCE', 'CHEF BUREAU', 'OPERATIONNEL POLYVALENT'];
        for ($i = 0; $i < 4; $i++) {
            Profil::create([
                'intitule' => $tab[$i],
            ]);
        };
    }
}
