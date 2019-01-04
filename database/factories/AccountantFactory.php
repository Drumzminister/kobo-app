<?php

use Faker\Generator as Faker;

$genders = ['Male', 'Female'];

$factory->define(\Koboaccountant\Models\Accountant::class, function (Faker $faker) use($genders) {
	shuffle($genders);
	return [
		'id'                => $faker->uuid,
		'first_name'        => $faker->firstName,
		'last_name'         => $faker->lastName,
		'city'              => $faker->city,
		'state'             => $faker->city,
		'address'           => $faker->address,
		'sex'               => $genders[0],
		'country'           => $faker->country,
		'how_you_heard'     => $faker->sentence(10),
		'date_of_birth'     => $faker->date(),
	];
});