<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'collection_id' => 4,
        'title' => $faker->word,
        'description' => $faker->text(100),
        'price' => $faker->numberBetween(400, 1000),
        'image' => $faker->imageUrl(350, 250, 'food')
    ];
});
