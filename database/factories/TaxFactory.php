<?php

use App\Data\Tax;
use Faker\Generator as Faker;
$factory->define(Tax::class, function (Faker $faker) {
	return [
		'name' => $faker,
	];
});