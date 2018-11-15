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

$factory->define('Koboaccountant\Models\User', function (Faker $faker) {
    return [
        'id' => $faker->uuid,
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

$factory->define('Koboaccountant\Models\Vendor', function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'website' => $faker->url,
        'isActive' => $faker->numberBetween(0,1),
        'company_id' => $faker->numberBetween(30, 400),
    ];
});


$factory->define(Koboaccountant\Models\Inventory::class, function (Faker $faker) {
    return [
        'name' => $faker->words(6),
        'sales_price' => $faker->randomFloat(2),
        'purchase_price' => $faker->randomFloat(2),
        'quantity' => $faker->numberBetween(20,49),
        'description' => $faker->sentence(20),
        'delivered_date' => $faker->dateTimeThisYear,
        'attachment' => $faker->url,
        'vendor_id' => function() {
            return Koboaccountant\Models\Vendor::inRandomOrder()->id;
        }
    ];
});

$factory->define(Koboaccountant\Models\SalesChannel::class, function() {
    return [
        'name' => $faker->name,
        'company_id' => $this->CompanyId(),
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
        'inventory_id' => function() {
            return Koboaccountant\Models\Inventory::inRandomOrder()->id;
        },
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

// $threads->each(function($thread) {
//     factory('App\Reply', 10)->create(['thread_id' => $thread->id]);
// });