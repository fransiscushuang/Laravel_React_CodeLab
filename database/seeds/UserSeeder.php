<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        User::create([
            'name' => 'Tester2',
            'email' => 'tester2@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Tester3',
            'email' => 'tester3@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
