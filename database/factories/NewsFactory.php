<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use App\Category;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title'=>$faker->userName,
        'subject'=>$faker->text,
        'category_id'=>function(){return Category::all()->random();},
    ];
});
