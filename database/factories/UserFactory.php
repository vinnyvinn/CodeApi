<?php
use App\User;
use App\Promocode;
use App\Ride;
use App\Event;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Promocode::class, function (Faker $faker) {
    return [
        'code' => str_random(10),
        'radius' => rand(10,1000),
        'status' => $faker->randomElement([Promocode::CODE_ACTIVE,Promocode::CODE_INACTIVE]),
        'user_id' => User::all()->random()->id,
        'ride_id' => Ride::all()->random()->id,
        
    ];
});

$factory->define(Ride::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'amount' => $faker->numberBetween(50,1000),
                
    ];
});

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        
    ];
});


