<?php

namespace Database\Seeders;

use App\Models\Bureau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BureauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bureaux pour l'agence avec le code 1
        DB::table('bureaus')->insert([
            'intitule' => 'Suru-Léré',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Sègbèya',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Zongo',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Jéricho',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Gbégamey',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Calavi',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'OUIDAH',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Allada',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Fifadji',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Fidjrossè',
            'codeAgence' => 1,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Cocotomey',
            'codeAgence' => 1,
        ]);

        // Bureaux pour l'agence avec le code 2
        DB::table('bureaus')->insert([
            'intitule' => 'HOUNSOUKO',
            'codeAgence' => 2,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Adjinan',
            'codeAgence' => 2,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'OUANDO',
            'codeAgence' => 2,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Adjarra',
            'codeAgence' => 2,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Avrankou',
            'codeAgence' => 2,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Ifangni',
            'codeAgence' => 2,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Pobé',
            'codeAgence' => 2,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Kétou',
            'codeAgence' => 2,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Adjohoun',
            'codeAgence' => 2,
        ]);
        // Bureaux pour l'agence avec le code 3
        DB::table('bureaus')->insert([
            'intitule' => 'Amanwignon',
            'codeAgence' => 3,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Kandi',
            'codeAgence' => 3,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Banikoara',
            'codeAgence' => 3,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Malanville',
            'codeAgence' => 3,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Natitingou',
            'codeAgence' => 3,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Tanguiéta',
            'codeAgence' => 3,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Djougou',
            'codeAgence' => 3,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Nikki',
            'codeAgence' => 3,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Bembèrèkè',
            'codeAgence' => 3,
        ]);

        // Bureaux pour l'agence avec le code 4
        DB::table('bureaus')->insert([
            'intitule' => 'Bohicon',
            'codeAgence' => 4,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Glazoué',
            'codeAgence' => 4,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Savalou',
            'codeAgence' => 4,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Bantè',
            'codeAgence' => 4,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Savè',
            'codeAgence' => 4,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Lokossa',
            'codeAgence' => 4,
        ]);

        DB::table('bureaus')->insert([
            'intitule' => 'Azovè',
            'codeAgence' => 4,
        ]);
    }
}
