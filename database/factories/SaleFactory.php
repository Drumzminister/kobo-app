<?php

use Koboaccountant\Models\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
	return [
		'id' => $faker->uuid,
		'company_id' => '',
		'staff_id' => '',
		'invoice_number' => explode('-', $faker->uuid)[0],
		'total_amount' => $faker->randomFloat(2),
		'delivery_cost' => random_int(200, 1500),
	];
});