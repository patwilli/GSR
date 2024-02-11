<?php

namespace Database\Seeders;

use App\Models\Agence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agences')->insert([
            'intitule' => 'Cotonou',
        ]);

        DB::table('agences')->insert([
            'intitule' => 'Porto-novo',
        ]);

        DB::table('agences')->insert([
            'intitule' => 'Parakou',
        ]);

        DB::table('agences')->insert([
            'intitule' => 'Abomey',
        ]);
    }
}
