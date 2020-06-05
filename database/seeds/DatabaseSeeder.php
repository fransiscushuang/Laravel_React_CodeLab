<?php

use Illuminate\Database\Seeder;
use App\Models\Story;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->addingStories();
    }

    public function addingStories()
    {
        Story::create([
            'title' => 'This is a title',
            'description' => 'This is a description for this title',
            'due_date' => now()->addDay(2),
            'story_points' => 2,
            'story_type' => 'bug',
            'user_id' => 1,
            'epic_id' => 1
        ])->users()->createMany([
            ['user_id' => 2],
            ['user_id' => 1],
        ]);

        Story::create([
            'title' => 'This is a title 2',
            'description' => 'This is a description for this title 2',
            'due_date' => now()->addDay(2),
            'story_points' => 2,
            'story_type' => 'fiction',
            'user_id' => 1,
            'epic_id' => 1
        ])->users()->createMany([
            ['user_id' => 2],
            ['user_id' => 1],
            ['user_id' => 3],
            ['user_id' => 4],
        ]);
    }
}
