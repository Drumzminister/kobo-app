<?php 

namespace Koboaccountant\Repositories\PaymentMethod;

use Koboaccountant\Models\PaymentMethod;
use Koboaccountant\Models\Account;

use Koboaccountant\Repositories\BaseRepository;

class PaymentMethodRepository extends BaseRepository 
{
    public function __construct(PaymentMethod $paymentMethod, Account $account) 
    {
        $this->paymentModel = $paymentMethod;
        $this->accountModel = $account;
    }

    public function getPaymentMethod()
    {
        return $this->paymentModel->get();
    }

    public function create($data)
    {
        $paymentMethod = new PaymentMethod;
        $paymentMethod->id = $this->generateUuid();
        $paymentMethod->name = $data['name'];
        $paymentMethod->account_id = $account->id;

        $paymentMethod->save();
        return true;
    }

    public function update($data)
    {
        $paymentMethod = Customer::where('id', $data['company_id'])->first();
        $paymentMethod->name = isset($data['name']) ? $data['name'] : null;
        $paymentMethod->save();

        return true;
    }
}