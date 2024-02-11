<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('roles')->insert([
                'codeProfil' => 1,
                'codeFonctionnalite' => $i,
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            if ($i != 3 && $i != 7 && $i != 9) {
                DB::table('roles')->insert([
                    'codeProfil' => 2,
                    'codeFonctionnalite' => $i,
                ]);
            }
        }
        for ($i = 1; $i <= 10; $i++) {
            if ($i != 3 && $i != 9) {
                DB::table('roles')->insert([
                    'codeProfil' => 3,
                    'codeFonctionnalite' => $i,
                ]);
            }
        }
        for ($i = 1; $i <= 10; $i++) {
            if ($i != 6 && $i != 7 && $i != 9) {
                DB::table('roles')->insert([
                    'codeProfil' => 4,
                    'codeFonctionnalite' => $i,
                ]);
            }
        }

        // Role::factory()->count(10)->create();
    }
}
