<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Nisa Cantik',
            'email' => 'nisa@gmail.com',
            'nip' => '17710094',
            'level' => 'admin',
            'password' => bcrypt('password')
        ]);
    }
}
