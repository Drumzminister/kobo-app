<?php

use Faker\Generator as Faker;

$genders = ['Male', 'Female'];

$factory->define(\Koboaccountant\Models\Accountant::class, function (Faker $faker) use($genders) {
	shuffle($genders);
	return [
		'id'                => $faker->uuid,
        'kobo_id'           => 'A-' . str_random(8),
		'first_name'        => $faker->firstName,
		'last_name'         => $faker->lastName,
		'picture'			=> $faker->imageUrl($width = 640, $height = 480),
		'city'              => $faker->city,
		'years_of_experience' => rand(0, 10),
		'level'				=> "KB4",
		'state'             => $faker->city,
		'address'           => $faker->address,
		'sex'               => $genders[0],
		'country'           => $faker->country,
		'how_you_heard'     => $faker->sentence(10),
		'date_of_birth'     => $faker->date(),
	];
});
