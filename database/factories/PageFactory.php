<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Page::class, function (Faker $faker) {
    return [
        'template' => 'page.index',
        'name' => $faker->sentence,
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'text' => $faker->paragraph,
        'alias' => 'index'
    ];
});
