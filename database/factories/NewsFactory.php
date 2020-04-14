<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\News;
use Faker\Generator as Faker;



$factory->define(News::class, function (Faker $faker) {
    $category_id = Category::query()->count();
    return [
        'title' => $faker->realText(rand(30, 50)),
        'shortText' => $faker->realText(rand(50, 250)),
        'text' => $faker->realText(rand(1500, 4000)),
        'isPrivate' => (bool)rand(0,1),
        'category_id' => rand(1, $category_id),
        'image' => '/img/news' . rand(1,8) .'.jpg',
    ];
});
