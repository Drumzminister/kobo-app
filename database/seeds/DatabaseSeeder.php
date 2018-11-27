<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = factory('Koboaccountant\Models\User', 10)->create()->each(function ($user) {
            $user->company()->save(factory('Koboaccountant\Models\Company')->make());
        });

        $companies = $users->each(function ($user) {
            factory('Koboaccountant\Models\Company', 10)->create(['user_id' => $this->getRandomUserId()]);
        });

        $vendor = factory('Koboaccountant\Models\Vendor', 10)->create(['company_id' => $this->getRandomCompanyId()]);

        $inventories = $vendor->each(function ($vendor) {
            factory('Koboaccountant\Models\Inventory', 10)->create();
        });

        $staff = factory('Koboaccountant\Models\Staff', 10)->create(['company_id' => $this->getRandomCompanyId()]);

        $sales = factory('Koboaccountant\Models\Sales', 10)->create(['company_id' => $this->getRandomCompanyId(), 'inventory_id' => $this->getRandomInventoryId(), 'staff_id' => $this->getRandomStaffId()]);

        $customer = $sales->each(function ($sales) {
            factory('Koboaccountant\Models\Customer', 10)->create(['company_id' => $this->getRandomCompanyId()]);
        });
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

    public function getRandomVendorId()
    {
        $vendors = \Koboaccountant\Models\Vendor::all();

        return $vendors->random()->id;
    }

    public function getRandomInventoryId()
    {
        $inventories = \Koboaccountant\Models\Inventory::all();

        return $inventories->random()->id;
    }

    public function getRandomStaffId()
    {
        $staff = \Koboaccountant\Models\Staff::all();

        return $staff->random()->id;
    }
}
