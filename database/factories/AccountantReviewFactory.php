<?php

use App\Data\CompanyReview;
use Faker\Generator as Faker;
use Koboaccountant\Models\Review;


$factory->define(Review::class, function (Faker $faker) use($genders) {
	return [
		'id' => $faker->uuid,
		'subject' => $faker->sentence(5),
		'comment' => $faker->sentence(20),
		'other_notes' => $faker->sentence(20),
		'rating' => random_int(1, 5),
	];
});