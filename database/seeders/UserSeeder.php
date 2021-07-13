<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => "admin",
            'sobrenome' => "do sistema",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'role' => User::ROLE_ENUM["admin"],
        ]);

        User::create([
            'nome' => "chefe",
            'sobrenome' => "de setor",
            'email' => "chefe@chefe.com",
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'role' => User::ROLE_ENUM["chefeSetorConcursos"],
        ]);

        User::create([
            'nome' => "presidente",
            'sobrenome' => "da banca",
            'email' => "presidente@presidente.com",
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'role' => User::ROLE_ENUM["presidenteBancaExaminadora"],
        ]);
    }
}
