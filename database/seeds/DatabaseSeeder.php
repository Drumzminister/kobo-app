<?php

use App\Data\AccountantClient;
use Illuminate\Database\Seeder;
use Koboaccountant\Models\Accountant;
use Koboaccountant\Models\Client;
use Koboaccountant\Models\Company;
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

        $user = factory(User::class)->create();

        $accountant = factory(Accountant::class)->create(['user_id' => $user->id]);

        $clientUser = factory(User::class)->create();

        $client = factory(Client::class)->create(['accountant_id' => $accountant->id, 'user_id' => $clientUser->id, 'subscription_plan_id' => $subscription->id]);

        factory(Company::class)->create(['user_id' => $clientUser->id]);

        factory(AccountantClient::class)->create([ 'client_id' => $client->id, 'accountant_id' => $accountant->id]);
    }
}
