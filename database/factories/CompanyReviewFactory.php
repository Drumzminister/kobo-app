<?php

use App\Data\CompanyReview;
use Faker\Generator as Faker;


$factory->define(CompanyReview::class, function (Faker $faker) use($genders) {
	return [
		'id' => $faker->uuid,
		'subject' => $faker->sentence(5),
		'review' => $faker->sentence(20),
	];
});