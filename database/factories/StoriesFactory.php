<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

/* NOTE: Don't define namespace
        Ex: use App\Models\Story
   It won't work!
*/

use Faker\Generator as Faker;

$factory->define(Story::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph(),
        'due_date' => $faker->date('Y-m-d H:i:s'),
        'story_points' => $faker->randomElement([0, 1, 2, 3, 5, 8, 13, 15, 20]),
        'story_type' => $faker->randomElement(['Bug', 'Fiction', 'Romance']),
        'user_id' => 1,
        'epic_id' => 1,
    ];
});
