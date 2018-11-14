<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Koboaccountant\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'verified' => $faker->numberBetween(0,1),
        'attachment' => $faker->imageUrl(),
        'isActive' => $faker->numberBetween(0,1),
        'payment_status' => $faker->numberBetween(0,1),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Koboaccountant\Models\Vendor::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'website' => $faker->url,
        'isActive' => $faker->numberBetween(0,1),
        'company_id' => $this->CompanyId,
        'user_id' => $this->UserId,
    ];
});

$factory->define(Koboaccountant\Models\Sales::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'sales_date' => $faker->DateTime,
        'quantity' => $faker->numberBetween(1,20),
        'amount' => $faker->float,
        'staff_id' => '',
        'company_id' => $this->CompanyId,          
        'inventory_id' => '',
    ];
});

function CompanyId()
{
    return Koboaccountant\Models\Company::inRandomOrder()->id();
}
function UserId()
{
    return Koboaccountant\Models\User::inRandomOrder()->id();
}

$threads->each(function($thread) {
    factory('App\Reply', 10)->create(['thread_id' => $thread->id]);
});