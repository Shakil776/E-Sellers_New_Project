<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\ProductStatus;

$factory->define(ProductStatus::class, function (Faker $faker) {
    return [
        'status_name' => $faker->name,
        'publication_status' => $faker->boolean,
    ];
});
