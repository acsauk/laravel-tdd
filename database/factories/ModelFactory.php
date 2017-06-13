<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Concert::class, function (Faker\Generator $faker) {
  return [
    'title' => 'Example band',
    'subtitle' => 'with Fake Opening band',
    'date' => Carbon::parse('+2 weeks'),
    'ticket_price' => 3250,
    'venue' => 'The Test Hall',
    'address' => '123 Test Avenue',
    'city' => 'Fakeberg',
    'county' => 'West Midlands',
    'post_code' => 'B1 3DB',
    'additional_information' => 'Some fake additional info'
  ]
});
