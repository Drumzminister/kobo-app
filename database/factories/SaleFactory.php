<?php

use Koboaccountant\Models\Sale;

$factory->define(Sale::class, function (Faker $faker) {
	return [
		'id' => $faker->uuid,
		'name' => $faker->sentence(8),
		'date' => $faker->dateTime(),
		'quantity' => $faker->numberBetween(1, 20),
		'amount' => $faker->randomFloat(2),
		'staff_id' => '',
		'company_id' => '',
		'inventory_id' => '',
	];
});