<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\Reference\Gender;

$factory->define(Gender::class, function (Faker $faker) {
    return [
        'name' => 'Male',
        'slug' => 'male',
        'display_order' => 0,
        'active' => true
    ];
});
