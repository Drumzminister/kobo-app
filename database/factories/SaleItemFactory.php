<?php

use App\Data\SaleItem;
use Faker\Generator as Faker;

$factory->define(SaleItem::class, function (Faker $faker) {
	return [
		'quantity' => $faker->numberBetween(1, 20),
	];
});