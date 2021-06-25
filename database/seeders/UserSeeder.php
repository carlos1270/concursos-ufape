<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create(['email' => 'admin@admin.com']);
        \App\Models\User::factory(1)->create(['email' => 'chefe@chefe.com', 'role' => User::ROLE_ENUM["chefeSetorConcursos"]]);
    }
}
