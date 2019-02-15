<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\CreditorRepository;
use App\Data\Repositories\InventoryItemRepository;
use App\Domains\Banks\Jobs\DebitBanksJob;
use http\Env\Request;
use App\Data\Repositories\InventoryRepository;
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
        $this->data['vendor_id'] = $this->data['vendor_id']['id'];
        $inventory = $this->inventory->fillAndSave($this->data);
        $debit = (new DebitBanksJob($this->data['banks'], $inventory, $this->companyId))->handle();
        if ($debit->status !== 'success') {
            throw new \Exception($debit->message);
        }
        if($this->data['amount_paid'] < $this->data['total_cost_price']) {
            $this->checkAmountPaid($this->data['amount_paid'], $this->data['total_cost_price'], $this->companyId, $this->userId, $this->data['vendor_id'], $this->data['invoice_number'], $this->data['delivered_date']);
        }

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
     * @param $expectedAmount $user_id, $vendor_id, $invoice_number, $date
     * @param $company_id
     * @param $user_id
     * @param $vendor_id
     * @param $invoice_number
     * @param $date
     * @return bool
     * @throws \Exception
     */
    private function checkAmountPaid($amountPaid, $expectedAmount, $company_id, $user_id, $vendor_id, $invoice_number, $date)
    {
        $amount = $expectedAmount - $amountPaid ;
        $data['amount'] = $amount;
        $data['user_id'] = $user_id;
        $data['company_id'] = $company_id;
        $data['vendor_id'] = $vendor_id;
        $data['invoice_number'] = $invoice_number;
        $data['date'] = $date;
        $creditor = new CreditorRepository();
        $creditor->fillAndSave($data);
        return true;
    }
}
