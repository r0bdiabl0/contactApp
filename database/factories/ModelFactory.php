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
$factory->define(contactApp\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(contactApp\Contact::class, function () {

    return [
        'user_id'             => 1,
        'contact_type'        => 'friend',
        'name'                => 'Test Contact',
        'email_address'       => 'testcontact@example.com',
        'address'             => '123 Any St',
        'city'                => 'Salt Lake City',
        'state'               => 'UT',
        'postal_code'         => '84101',
        'phone_number_1'      => '801-555-1212',
        'phone_number_1_type' => 'mobile'
    ];
});
