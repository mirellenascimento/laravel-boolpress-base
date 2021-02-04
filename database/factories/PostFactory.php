<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Carbon\Carbon;


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'category_id'=>$faker->numberBetween(1,10),
        'title'=>$faker->sentence(),
        'author'=>$faker->name(),
        'created_at'=>Carbon::now()->toDateTimeString(),
    ];
});
