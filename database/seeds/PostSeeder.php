<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Post::class, 100)->create()->each(function ($post) {
            $post->postInformation()->save(factory(App\PostInformation::class)->make());
        });
    }
}