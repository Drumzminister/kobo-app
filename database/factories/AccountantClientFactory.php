<?php

use Faker\Generator as Faker;

$plans = ['PRO', 'BASIC', 'MID'];

$factory->define(\App\Data\AccountantClient::class, function (Faker $faker) use($plans) {
	shuffle($plans);
	return [
		'company_name'          => ucfirst($faker->colorName),
		'avatar'                => $faker->imageUrl(480, 480, 'cats'),
		'ID_number'             => "HN-" . $faker->randomNumber(4),
		'subscription_plan'     => $plans[0],
	];
});