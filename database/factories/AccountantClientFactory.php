<?php

use App\Data\AccountantClient;
use Faker\Generator as Faker;


$factory->define(AccountantClient::class, function (Faker $faker) {
	return [
		'id' => $faker->uuid,
	];
});