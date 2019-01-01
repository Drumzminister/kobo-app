<?php

use Faker\Generator as Faker;


$factory->define(\App\Data\AccountantClient::class, function (Faker $faker) {
	return [
		'id' => $faker->uuid,
	];
});