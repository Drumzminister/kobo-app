<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryItemRepository;
use App\Domains\Banks\Jobs\DebitBanksJob;
use http\Env\Request;
use App\Data\Repositories\InventoryRepository;
use Koboaccountant\Repositories\Opening\CreditorRepository;
use Lucid\Foundation\Job;

class AddInventoryJob extends Job
{
    /**
     * @var array
     */
    private $data;
    /**
     * Create a new job instance.
     *
     */
    private $inventory, $inventoryItem, $userId, $companyId;

    /**
     * AddInventoryJob constructor.
     * @param array $data
     * @param $userId
     * @param $companyId
     */
    public function __construct(array $data, $userId, $companyId)
    {
        $this->data = $data;
        $this->userId = $userId;
        $this->companyId = $companyId;
        $this->inventory = app(InventoryRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return bool
     * @throws \Exception
     */
    public function handle()
    {
        $this->data['invoice_number'] = explode('-', $this->inventory->generateUuid()->toString())[0];
        $this->data['user_id'] = $this->userId;
        $this->data['company_id'] = $this->companyId;
        $this->data['tax_id'] = $this->data['tax_id']['id'];
        $inventory = $this->inventory->fillAndSave($this->data);
        $debit = (new DebitBanksJob($this->data['banks'], $inventory, $this->companyId))->handle();

        if ($debit->status !== 'success') {
            throw new \Exception($debit->message);
        }

        //Todo move the user to the debitor
        $this->checkAmountPaid($this->data['amount_paid'], $this->data['total_cost_price']);

        if($debit->status === 'success') {

            $inventoryId = $inventory->id;
            $inventoryItems = $this->data['inventoryItem'];
            foreach($inventoryItems as $item)
            {
                $this->inventoryItem = app(InventoryItemRepository::class);
                $item['user_id'] = $this->userId;
                $item['company_id'] = $this->companyId;
                $item['inventory_id'] = $inventoryId;
                $inventory = $this->inventoryItem->fillAndSave($item);
            }
            return true;
        }
    }

    /**
     * @param $amountPaid
     * @param $expectedAmount
     */
    private function checkAmountPaid($amountPaid, $expectedAmount) {
        if (!empty(auth()->user()->id)) {
            $user = auth()->user()->id;
        }
        /** @var TYPE_NAME $userCompany */
        $userCompany = auth()->user()->company->id;
        if ($amountPaid < $expectedAmount) {
           //New up the repository and fill the item, amount and date
        }
    }
}
