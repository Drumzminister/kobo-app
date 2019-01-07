<?php

use App\Data\AccountantClient;
use App\Data\CompanyReview;
use Illuminate\Database\Seeder;
use Koboaccountant\Models\Accountant;
use Koboaccountant\Models\Asset;
use Koboaccountant\Models\Client;
use Koboaccountant\Models\Company;
use Koboaccountant\Models\Customer;
use Koboaccountant\Models\Debtor;
use Koboaccountant\Models\Review;
use Koboaccountant\Models\Role;
use Koboaccountant\Models\SubscriptionPlan;
use Koboaccountant\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SeedBanks::class);

	    $plans = collect(['PRO', 'BASIC', 'MID']);

	    $plans->each(function ($plan) {
	    	factory(SubscriptionPlan::class)->create([ 'name' => $plan]);
	    });

	    $subscription = SubscriptionPlan::first();

        $accountantUser = factory(User::class)->create();
        $accountantRole = factory(Role::class)->create([ 'name' => 'Accountant', 'user_id' => $accountantUser->id]);

        $accountant = factory(Accountant::class)->create(['user_id' => $accountantUser->id]);

        $clientUser = factory(User::class)->create();
        $clientRole = factory(Role::class)->create(['name' => 'Client', 'user_id' => $clientUser->id]);

	    $client = factory(Client::class)->create(['accountant_id' => $accountant->id, 'user_id' => $clientUser->id, 'subscription_plan_id' => $subscription->id]);

	    factory(AccountantClient::class)->create(['client_id' => $client->id, 'accountant_id' => $accountant->id]);

	    $company = factory(Company::class)->create(['user_id' => $clientUser->id]);

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



    }
}
