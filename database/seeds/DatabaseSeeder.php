<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();


        factory('Koboaccountant\Models\User', 5)->create()->each(function ($user) {
            $user->vendors()->saveMany(factory('Koboaccountant\Models\Vendor', 20)->make());
        });
        // $this->call(UsersTableSeeder::class, 20)->create();


        Eloquent::reguard();
    }
}
