<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentPaymentRepository;
use App\Data\Repositories\RentRepository;
use App\Domains\Banking\Jobs\DebitAccountJob;
use App\Domains\Banks\Jobs\DebitBanksJob;
use Lucid\Foundation\Job;

class PayRentJob extends Job
{
    private $rent, $rentPayment;
    private $companyId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($rentId, $data, $companyId)
    {
        $this->companyId = $companyId;
        $this->data = $data;
        $this->rentId = $rentId;
        $this->rent = new RentRepository();
        $this->rentPayment = new RentPaymentRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $rent = $this->rent->find($this->rentId);
        if ($rent->has_completed_payment) {
            throw new \Exception('Payment has already been made for this period');
        }
        $methods = json_decode($this->data['paymentMethods'], true);

        $debit = (new DebitBanksJob($methods, $rent, $this->companyId))->handle();
//        dd($debit);

        if ($debit->status !== 'success') {
            throw new \Exception($debit->message);
        }

        if (floatval($rent->amount) === floatval($this->data['amount'])) {
            $rent->has_completed_payment = true;
            $rent->save();
        }

        $payment = $this->rentPayment->fillAndSave([
            'rent_id'   =>  $this->rentId,
            'amount'    =>  $this->data['amount'],
            'current_period'    =>  $rent->periods_passed,
        ]);

    }
}
