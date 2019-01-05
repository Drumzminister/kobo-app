<?php

use Faker\Generator as Faker;

$suffixes = ['LLC.', 'LTD.', 'GmBH.'];

$factory->define(\Koboaccountant\Models\Client::class, function (Faker $faker) use($suffixes) {
	shuffle($suffixes);
	return [
		'id'                        => $faker->uuid,
		'business_name'             => ucfirst($faker->colorName) . ' ' . $suffixes[0],
		'business_address'          => $faker->address,
	];
});