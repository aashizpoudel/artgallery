<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Art;
use Faker\Generator as Faker;

$factory->define(Art::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->city,
        'description'=>$faker->sentence,
        'image'=>'dummy.jpg',
        'seller_phone'=>'9856045678',
        'seller_name'=>$faker->name,
        'seller_address'=>$faker->address,
        'price'=>rand(100,2000),
        'negotiable'=>false,
        'user_id'=>App\User::inRandomOrder()->first()->id
    ];
});
