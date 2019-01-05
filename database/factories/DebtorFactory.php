<?php

use Faker\Generator as Faker;
use Koboaccountant\Models\Debtor;


$factory->define(Debtor::class, function (Faker $faker) {
	return [
		'amount' => random_int(1000, 3000),
	];
});