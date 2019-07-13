<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Users\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'suffix' => '',
        'nickname' => $faker->firstName,
        'email' => "{$faker->firstName}.{$faker->lastName}@us.af.mil",
        'email_verified_at' => now(),
        'date_of_birth' => null,
        'gender_id' => null,
        'avatar' => null,
        'password' => bcrypt('password'),
        'password_reset_required' => false,
        'last_password_reset' => now(),
        'last_login' => null,
        'admin' => false
    ];
});
