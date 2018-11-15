<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = factory('Koboaccountant\Models\User', 10)->create()->each(function($user) {
            $user->company()->save(factory('Koboaccountant\Models\Company')->make());
        });
        
        $inventory = factory('Koboaccountant\Models\Inventory', 20)->create();

        $staff = factory('Koboaccountant\Models\Staff', 20)->create(['company_id' => $this->getRandomCompanyId()]);
        
        $sales = factory('Koboaccountant\Models\Sales', 30)->create(['staff_id' => $staff->id, 'company_id' => $this->getRandomCompanyId(), 'inventory_id' => $inventory->id]);
    

    }

    public function getRandomCompanyId()
    {
        $company = \Koboaccountant\Models\Company::all();

        return $company->random()->id;
    }
    public function getRandomUserId()
    {
        $user = \Koboaccountant\Models\User::all();

        return $user->random()->id;
    }

}