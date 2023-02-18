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
            'name' => 'PRESIDEN',
            'email' => 'presiden@gmail.com',
            'level' => 'presiden',
            'password' => bcrypt('password')
        ]);
    }
}
