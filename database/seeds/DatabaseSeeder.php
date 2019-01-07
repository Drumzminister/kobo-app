<?php

use App\Data\AccountantClient;
use App\Data\BankDetail;
use App\Data\CompanyReview;
use Illuminate\Database\Seeder;
use Koboaccountant\Models\Accountant;
use Koboaccountant\Models\Asset;
use Koboaccountant\Models\Client;
use Koboaccountant\Models\Company;
use Koboaccountant\Models\Customer;
use Koboaccountant\Models\Debtor;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\Review;
use Koboaccountant\Models\Role;
use Koboaccountant\Models\SaleChannel;
use Koboaccountant\Models\Staff;
use Koboaccountant\Models\SubscriptionPlan;
use Koboaccountant\Models\User;
use Koboaccountant\Models\Vendor;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SeedBanks::class);

	    $this->createPlans();
	    $accountant1 = $this->createAccountant();
	    $accountant2 = $this->createAccountant();

        $clientData = $this->createClientAndHisCompany($accountant1);
        $vendorData = $this->createClientAndHisCompany($accountant2);// This person is a vendor of the client above

    }

    private function createPlans()
    {
	    $plans = collect(['PRO', 'BASIC', 'MID']);

	    $plans->each(function ($plan) {
		    factory(SubscriptionPlan::class)->create(['name' => $plan]);
	    });
    }

    private function seedBanks($nums, $userId)
    {
	    return factory(BankDetail::class, $nums)->create(['user_id' => $userId]);
    }

    private function seedSalesChannel($nums, $userId)
    {
	    return factory(SaleChannel::class, $nums)->create(['user_id' => $userId]);
    }

    private function seedInventories()
    {

    }

    private function createAccountant()
    {
	    $accountantUser = $this->createUserWithRole('Accountant');
	    $accountant = factory(Accountant::class)->create(['user_id' => $accountantUser->id]);

	    return $accountant;
    }

    private function createVendorsForUser($nums, $company)
    {
		return factory(Vendor::class, $nums)->create(['company_id' => $company->id]);
    }


    private function createClientAndHisCompany($accountant)
    {
	    $subscription = SubscriptionPlan::first();

	    $clientUser = $this->createUserWithRole('Client');

	    $banks = $this->seedBanks(5, $clientUser->id);
	    $salesChannels = $this->seedSalesChannel(5, $clientUser->id);

	    $client = factory(Client::class)->create(['accountant_id' => $accountant->id, 'user_id' => $clientUser->id, 'subscription_plan_id' => $subscription->id]);

	    factory(AccountantClient::class)->create(['client_id' => $client->id, 'accountant_id' => $accountant->id]);

	    // Create Company for client
	    $company = factory(Company::class)->create(['user_id' => $clientUser->id]);

	    // Make this user a Staff
	    $staff = $this->createStaff($company, $clientUser);
		// Create vendor for client
	    $vendors = $this->createVendorsForUser(10, $company);

	    // Create Inventories from vendors
	    $vendors->each(function (Vendor $vendor) use ($clientUser) {
	    	$inventories = factory(Inventory::class, 4)->create(['user_id' => $clientUser->id, 'vendor_id' => $vendor->id]);
	    });

	    // The accountant Can review a particular company
	    factory(CompanyReview::class)->create(['company_id' => $company->id]);

	    // Then a client review an accountant
	    factory(Review::class)->create(['accountant_id' => $accountant->id, 'client_id' => $client->id]);

	    factory(Asset::class, 6)->create(['company_id' => $company->id]);

	    $customers = factory(Customer::class, 12)->create(['company_id' => $company->id]);

	    $count = 0;
	    $customers->each(function (Customer $customer) use($company, &$count) {
		    if ($count === 3) return;

		    if ($customer->isActive) {
			    factory(Debtor::class)->create([ 'customer_id' => $customer->id, 'company_id' => $company->id]);
			    $count++;
		    }
	    });

	    return ['subscription' => $subscription, 'company' => $company, 'customers' => $customers];
    }

    private function createStaff($company, $user)
    {
    	return factory(Staff::class)->create(['company_id' => $company->id, 'user_id' => $user->id]);
    }

    private function createStaffsForCompany($company)
    {
    	$users = factory(User::class, 10)->create();

    	$users->each(function (User $user) {
    		$this->createUserWithRole('Staff');
	    });

    	$users->each(function (User $user) use($company) {
    		$staff = factory(Staff::class)->create(['company_id' => $company->id, 'user_id' => $user->id]);
	    });
    }

    private function createUserWithRole($role, $nums = 0)
    {
    	if ($nums === 0) {
		    $user = factory(User::class)->create();
		    $userRole = factory(Role::class)->create(['name' => $role, 'user_id' => $user->id]);
		    return $user;
	    }

	    $user = factory(User::class)->create();
	    $userRole = factory(Role::class)->create(['name' => $role, 'user_id' => $user->id]);
	    return $user;

    }
}
