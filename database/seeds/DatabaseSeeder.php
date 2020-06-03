<?php

use Illuminate\Database\Seeder;

use App\Models\User;

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
            'name' => 'Fransiscus',
            'email' => 'fransiscus.hermanto12@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Tester',
            'email' => 'tester@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
