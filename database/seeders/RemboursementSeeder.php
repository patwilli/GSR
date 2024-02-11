<?php

namespace Database\Seeders;

use App\Models\Remboursement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemboursementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Remboursement::factory()->count(85)->create();
    }
}
