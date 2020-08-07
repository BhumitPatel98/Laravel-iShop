<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {

    static $password;
    return [
        
        'name' => $faker->name,

        'email' => $faker->unique()->safeEmail,

        'password' => $password ?: $password = bcrypt('secret'),

        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Products::class, function (Faker $faker) {

 
    return [
        
        'name' => $faker->sentence,

        'image' => 'uploads/products/book.png',

        'discription' => $faker->paragraph(4),

        'price' => $faker->numberBetween(100,1000)
        
    ];
});
