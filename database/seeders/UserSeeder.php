<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Patrice SOSSAVI',
            'email' => 'patricesossavi@gmail.com',
            'login' => 'patou',
            'codeBureau' => 14,
            'codeAgence' => 2,
            'codeProfil' => 1,
            'password' => Hash::make('patou2003'),
            'bloque' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'ASSOUTO Kenneth',
            'email' => 'a.kenneth.1000@gmail.com',
            'login' => 'keno',
            'codeBureau' => 25,
            'codeAgence' => 3,
            'codeProfil' => 1,
            'password' => Hash::make('keno'),
            'bloque' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Ange DOVI',
            'email' => 'doviange@gmail.com',
            'login' => 'dovi',
            'codeBureau' => 3,
            'codeAgence' => 1,
            'codeProfil' => 2,
            'password' => Hash::make('password'),
            'bloque' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'GLELE Espoir',
            'email' => 'glele@gmail.com',
            'login' => 'espoir',
            'codeBureau' => 32,
            'codeAgence' => 4,
            'codeProfil' => 2,
            'password' => Hash::make('password'),
            'bloque' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'TABE Chelfy',
            'email' => 'tchelfy@gmail.com',
            'login' => 'chelfy',
            'codeBureau' => 29,
            'codeAgence' => 3,
            'codeProfil' => 3,
            'password' => Hash::make('password'),
            'bloque' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'GAUTHE Christian',
            'email' => 'gauthechrist@gmail.com',
            'login' => 'christ',
            'codeBureau' => 27,
            'codeAgence' => 3,
            'codeProfil' => 3,
            'password' => Hash::make('passworrd'),
            'bloque' => 0,
        ]);
        User::factory()->count(6)->create();
    }
}
