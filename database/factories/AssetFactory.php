<?php

use Faker\Generator as Faker;
use Koboaccountant\Models\Asset;


$factory->define(Asset::class, function (Faker $faker) {
	return [
		'id'   => $faker->uuid,
		'name' => ucfirst($faker->colorName),
		'quantity' => random_int(1, 100),
		'purchase_date' => $faker->date(),
		'amount' => random_int(1000, 3000),
		'total' => random_int(1000, 3000),
		'attachment' => $faker->sentence(5),
	];
});