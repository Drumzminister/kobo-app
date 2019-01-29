<?php

use App\Data\AccountantClient;
use App\Data\BankDetail;
use App\Data\CompanyReview;
use App\Data\InventoryItem;
use App\Data\SaleItem;
use App\Data\Tax;
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
use Koboaccountant\Models\Sale;
use Koboaccountant\Models\SaleChannel;
use Koboaccountant\Models\Staff;
use Koboaccountant\Models\SubscriptionPlan;
use Koboaccountant\Models\User;
use Koboaccountant\Models\Vendor;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
//        $this->call(SeedBanks::class);
        $this->createTaxes();

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

    private function seedBankDetails($nums, $companyId)
    {
	    factory(BankDetail::class)->create(['company_id' => $companyId, 'bank_name' => 'Cash', 'account_name' => 'Cash']);
	    return factory(BankDetail::class, $nums)->create(['company_id' => $companyId]);
    }

    private function seedSalesChannel($nums, $company, $user)
    {
	    return factory(SaleChannel::class, $nums)->create(['company_id' => $company->id, 'user_id' => $user->id]);
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

    private function createVendorsForUser($nums, $company, $user)
    {
		return factory(Vendor::class, $nums)->create(['company_id' => $company->id, 'user_id' => $user->id]);
    }

    private function createInventoryItem($nums, $inventory)
    {
        return factory(InventoryItem::class, $nums)->create(['inventory_id' => $inventory]);
    }

    private function createClientAndHisCompany($accountant)
    {
    	// Create some subscriptions
	    $subscription = SubscriptionPlan::first();

	    // Create a Client user
	    $clientUser = $this->createUserWithRole('Client');


	    // Put him under an accountant specified by $accountant
	    $client = factory(Client::class)->create(['accountant_id' => $accountant->id, 'user_id' => $clientUser->id, 'subscription_plan_id' => $subscription->id]);

	    // Link the accountant and client
	    factory(AccountantClient::class)->create(['client_id' => $client->id, 'accountant_id' => $accountant->id]);

	    // Create Company for client
	    $company = factory(Company::class)->create(['user_id' => $clientUser->id]);

	    // Create some bank accounts for him
	    $banks = $this->seedBankDetails(5, $company->id);

	    // Create some sales channels for him
	    $salesChannels = $this->seedSalesChannel(5, $company, $clientUser);

	    // Make this user a Staff of his company
	    $staff = $this->createStaffFromUser($company, $clientUser);

	    // Create Staffs for his company
	    $staffs = $this->createStaffsForCompany($company);

        // Create vendor for the client
        $vendors = $this->createVendorsForUser(10, $company, $clientUser);

        // Create Inventories (things he bought) from his vendors
        $inventories = collect([]);

        $vendors->each(function (Vendor $vendor) use ($company, &$inventories, $clientUser) {
            $inventory = $inventories->merge(factory(Inventory::class, 4)->create(['company_id' => $company->id, 'vendor_id' => $vendor->id, 'user_id' => $clientUser->id]));
            $inventory->each(function($inventory) {
                $this->createInventoryItem(10, $inventory->id);
            });
        });

        // Create inventory for the client

        // We make an accountant Review his company
	    factory(CompanyReview::class)->create(['company_id' => $company->id]);

	    // Then we make the client review his accountant
	    factory(Review::class)->create(['accountant_id' => $accountant->id, 'client_id' => $client->id]);

	    // We're creating some assets for his company
	    factory(Asset::class, 6)->create(['company_id' => $company->id]);

	    // We're creating some customers for his company as well
	    $customers = factory(Customer::class, 12)->create(['company_id' => $company->id, 'user_id' => $clientUser->id]);

	    // Here, we'll make some Customers debtors 😁
	    $count = 0;
	    $customers->each(function (Customer $customer) use($company, &$count) {
		    if ($count === 3) return;

		    if ($customer->isActive) {
			    factory(Debtor::class)->create(['customer_id' => $customer->id, 'company_id' => $company->id]);
			    $count++;
		    }
	    });

	    $this->createSales($staff, $company);

	    return ['subscription' => $subscription, 'company' => $company, 'customers' => $customers];
    }

    private function createStaffFromUser($company, $user)
    {
    	return factory(Staff::class)->create(['company_id' => $company->id, 'user_id' => $user->id]);
    }

    private function createStaffsForCompany($company)
    {
    	$users = $this->createUserWithRole('Staff', 10);

    	$users->each(function (User $user) use($company) {
    		factory(Staff::class)->create(['company_id' => $company->id, 'user_id' => $user->id]);
	    });
    }

    private function createUserWithRole($role, $nums = 0)
    {
    	if ($nums === 0) {
		    $user = factory(User::class)->create();
		    $userRole = factory(Role::class)->create(['name' => $role, 'user_id' => $user->id]);
		    return $user;
	    }

	    $users = factory(User::class, $nums)->create();

	    $users->each(function (User $user) use ($role) {
		    factory(Role::class)->create(['name' => $role, 'user_id' => $user->id]);
	    });

	    return $users;

    }

    private function createSales($staff, $company)
    {
	    $taxes = Tax::all();
	    $channels = $company->saleChannels;
	    $inventories = $company->inventories;
	    $customers = $company->customers;

	    $customers->each(function (Customer $customer) use ($inventories, $taxes, $staff, $company, $channels) {
			$thingsIWantToBuy = $inventories->random(random_int(1, $inventories->count()));
			$tax_id = $taxes->random()->id;

		    /**
		     * @var $sale Sale
		     */
		    $sale = factory(Sale::class)
			    ->create([
				    'customer_id'       => $customer->id,
				    'tax_id'            => $tax_id,
				    'staff_id'          => $staff->id,
				    'company_id'        => $company->id,
			    ]);

		    $totalAmount = 0;
			$thingsIWantToBuy->each(function (Inventory $inventory) use ($customer, $company, $sale, &$totalAmount, $channels) {
				if ($inventory->quantity > 0) {
					$channel_id = $channels->random()->id;
					$saleItem = factory(SaleItem::class)->make([
						'inventory_id' => $inventory->id,
						'sale_id' => $sale->id,
						'quantity' => $quantity = random_int(1, $inventory->quantity),
						'sales_price' => $sales_price = $inventory->sales_price,
						'total_price' => $sales_price * $quantity,
						'sale_channel_id'   => $channel_id,
					]);

					$totalAmount += $inventory->sales_price;
					$sale->saleItems()->save($saleItem);

					$inventory->quantity = $inventory->quantity - $quantity;
					$inventory->save();
				}
			});

			$sale->total_amount = $totalAmount;
			$sale->save();
	    });

    }

    private function createTaxes()
    {
    	$taxes = [
    		['name' => "Value Added Tax (VAT) 5%", 'percentage' => 5],
    		['name' => "PAT 10%", 'percentage' => 10],
    		['name' => "Cash", 'percentage' => 0],
	    ];
    	$availableTaxes = collect([]);

    	foreach($taxes as $key => $tax) {
    		$availableTaxes->push(factory(Tax::class)->create($tax));
	    }

    	return $availableTaxes;
    }
}
