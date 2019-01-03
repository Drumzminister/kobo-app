<?php

use Faker\Generator as Faker;
use Koboaccountant\Models\Creditor;


$factory->define(Creditor::class, function (Faker $faker) {
	return [
		'amount' => random_int(1000, 3000),
	];
});