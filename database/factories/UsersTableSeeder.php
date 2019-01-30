<?php

use App\Data\InventoryItem;
use Faker\Generator as Faker;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\SaleChannel;

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
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'verified' => $faker->numberBetween(0, 1),
        'attachment' => $faker->imageUrl(),
        'isActive' => $faker->numberBetween(0, 1),
        'remember_token' => str_random(10),
    ];
});

$suffixes = [' LLC.', ' LTD.', ' GmBH.'];

$factory->define('Koboaccountant\Models\Company', function (Faker $faker) use($suffixes) {
	shuffle($suffixes);
    return [
        'id' => $faker->uuid,
        'name' => $name = ucfirst($faker->sentence(2)) . $suffixes[0],
        'slug' => str_slug($name),
	    'ID_number' => preg_match_all('/\b(\w)/', strtoupper($name),$m) ? implode('', $m[1]) . '-' . $faker->randomNumber(5) : 'UV', // $v is now SOQTU
        'isActive' => 1,
        'logo' => $faker->imageUrl(),
    ];
});

$factory->define('Koboaccountant\Models\Vendor', function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'company_id' => '',
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'website' => $faker->url,
        'isActive' => $faker->numberBetween(0, 1),
    ];
});

$factory->define(InventoryItem::class, function (Faker $faker) {
   return [
       'id' => $faker->uuid,
       'inventory_id' => '',
       'user_id' => '',
       'company_id' => '',
       'name' => ucfirst($faker->sentence(2)),
       'sales_price' => $salesPrice = random_int(50, 2000),
       'purchase_price' => $salesPrice + random_int(50, 120),
       'quantity' =>  random_int(19, 50),
       'description' => ucfirst($faker->sentence(2)),
   ];
});
$factory->define(Inventory::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'invoice_number' => explode('-', $faker->uuid)[0],
        'user_id' => '',
        'vendor_id' => '',
        'attachment' =>  $faker->imageUrl(),
        'delivered_date' => $faker->dateTime(),
        'discount' =>  random_int(50, 120),
        'delivery_cost' =>  random_int(50, 120),
        'total_amount' =>  $amount = random_int(50, 120),
        'amount_paid' =>  $amount_paid = random_int(50, 120),
        'balance' =>  random_int(50, 120),
        'total_sales_price' => random_int(50, 120),
        'total_cost_price' => random_int(50, 120),
        'total_quantity' => random_int(50, 120),
    ];
});
$roles = ['CEO', 'Product Manager', 'Public Servant', 'Marketer', 'Member', 'Developer'];
$factory->define(\Koboaccountant\Models\Staff::class, function (Faker $faker) use($roles) {
	shuffle($roles);
    return [
        'id'            => $faker->uuid,
        'first_name'    => $faker->name,
        'last_name'     => $faker->name,
        'user_id'       => '',
        'company_id'    => '',
        'role'          => $roles[0],
        'salary'        => $faker->numberBetween(30000, 150000),
        'email'         =>  $faker->email,
        'phone'         =>  $faker->phoneNumber,
        'years_of_experience' => $faker->numberBetween(5, 20),
        'isActive'      => $faker->numberBetween(0, 1),
        'employed_date' => $faker->dateTime(),
        'avatar'        => $faker->imageUrl,
    ];
});

$factory->define(SaleChannel::class, function (Faker $faker) {
    return [
    	'id' => $faker->uuid,
        'name' => $faker->colorName,
    ];
});

$factory->define(Koboaccountant\Models\Customer::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->url,
        'image' => $faker->imageUrl,
        'user_id' => '',
        'isActive' => $faker->numberBetween(0, 1),
    ];
});
