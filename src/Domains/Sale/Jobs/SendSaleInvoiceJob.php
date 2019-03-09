<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleRepository;
use Illuminate\Foundation\Bus\Dispatchable;
use Koboaccountant\Models\Sale;
use Lucid\Foundation\QueueableJob;

class SendSaleInvoiceJob extends QueueableJob
{
	use Dispatchable;
	/**
	 * @var string
	 */
	private $saleId;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * @var array
	 */
	private $data;

    /**
     * Create a new job instance.
     *
     * @param Sale $sale
     */
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    	$sale = $this->sale->items;

        $html = view('client::pdf.invoice', $sale)->render();
        $pdf = app()->make('snappy.pdf.wrapper');
//	    $pdf->loadHTML($html);
//	    return $pdf->inline();
        $pdf = PDF::loadHTML($html)->setPaper('a4')->setOrientation('portrait')->setOption('margin-bottom', 0);
        return $pdf->inline();
    }
}
