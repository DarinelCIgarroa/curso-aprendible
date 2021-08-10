<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'image'         =>  $faker->imageUrl($width = 1200, $height = 400),
        'title'         =>  $title = $faker->sentence,
        'url'           =>  Str::slug($title),
        'description'   =>  $faker->paragraph,
    ];
});
