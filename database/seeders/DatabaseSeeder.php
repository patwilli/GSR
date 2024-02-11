<?php

namespace Database\Seeders;

use App\Models\Agence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call(ProduitSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(AgenceSeeder::class);
        $this->call(BureauSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FonctionnaliteSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CreditSeeder::class);
        $this->call(EcheancierSeeder::class);
        $this->call(RemboursementSeeder::class);
    }
}
