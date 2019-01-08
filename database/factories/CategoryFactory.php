<?php

use Faker\Generator as Faker;

$factory->define(App\Domains\Category\Category::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'name_slug' => str_slug($name),
        'description' => $faker->paragraph,
    ];
});
