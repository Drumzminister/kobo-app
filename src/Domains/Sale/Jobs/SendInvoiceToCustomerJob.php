<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleRepository;
use Lucid\Foundation\Job;

class SendInvoiceToCustomerJob extends Job
{
    /**
     * @var array
     */
    private $data;
    /**
     * @var string
     */
    private $saleId;

    /**
     * @var \Illuminate\Foundation\Application|SaleRepository
     */
    private $sale;

    /**
     * Create a new job instance.
     *
     * @param string $saleId
     * @param array $data
     */
    public function __construct(string $saleId, array $data)
    {
        $this->data = $data;
        $this->saleId = $saleId;
        $this->sale = app(SaleRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sale = $this->sale->find($this->saleId);

        dispatch(new SendSaleInvoiceJob($sale))->onQueue('invoice');
    }
}
