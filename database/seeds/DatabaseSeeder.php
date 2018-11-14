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
        Model::ungard();


        $this->call(UsersTableSeeder::class, 20)->create();


        Model::reguard();
    }
}
