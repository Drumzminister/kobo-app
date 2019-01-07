<?php

use Faker\Generator as Faker;
use Koboaccountant\Models\Role;

$factory->define(Role::class, function (Faker $faker) {
	return [
		'description'   => $faker->sentence(3),
	];
});