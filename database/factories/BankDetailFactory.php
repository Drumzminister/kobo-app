<?php

use App\Data\BankDetail;
use Faker\Generator as Faker;


$factory->define(BankDetail::class, function (Faker $faker) {
	return [
		'id' => $faker->uuid,
		'bank_name' => getBetterName($faker) . " Bank",
		'account_name' => $faker->name,
		'account_number' => $faker->randomNumber(7) . "000",
		'account_balance' => $faker->randomNumber(6),
	];
});

function getBetterName($faker)
{
	return ucfirst(preg_replace('/\.[a-z]{2,3}/i', '', $faker->domainName));
}