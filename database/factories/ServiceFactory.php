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

$factory->define(App\Service::class, static function (Faker $faker) {
    return [
        'price' => 200,
        'name' => $faker->name,
        'slogan' => $faker->sentence,
        'title_block' => $faker->sentence,
        'menu_name' => $faker->name,
        'title' => $faker->name,
        'description' => $faker->sentence,
        'preview' => $faker->sentence,
        'text' => $faker->text,
        'alias' => $faker->slug,
        'is_published' => 1,
        'is_showed_dev_stages' => 0,
        'pos' => 0
    ];
});
