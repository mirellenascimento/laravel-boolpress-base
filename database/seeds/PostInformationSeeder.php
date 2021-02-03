<?php

use Illuminate\Database\Seeder;
use App\PostInformation;


class PostInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PostInformation::class, 10)
        ->create()
        ->each(function($PostInformation){
            $PostInformation->save();
        });
    }
}
