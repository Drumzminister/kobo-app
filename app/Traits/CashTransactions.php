<?php
/**
 * Created by PhpStorm.
 * User: James John James
 * Date: 12/13/2018
 * Time: 1:45 PM
 */

namespace Koboaccountant\Traits;

use Auth;
use Koboaccountant\Models\Cash;


trait CashTransactions
{

    /**
     * @param $amount
     */
    public function createCashAccount ($amount)
    {
        $cash = new Cash();
        $cash->opening_amount = $amount;
        $cash->amount = $amount;
        $cash->id = $this->generateUuid();
        $cash->user_id = $this->getAuthUserId();
        $cash->save();
    }

    /**
     * @param $amount
     * @throws \Exception
     */
    public function addCash ($amount)
    {
        if (is_numeric($amount)) {
            $cash = Cash::where('user_id', $this->getAuthUserId())->first();
            if (is_null($cash)) {
                $this->createCashAccount($amount);
                return;
            }
            $cash->amount += floatval($amount);
            $cash->save();
        } else {
            throw new \Exception("Amount must be numeric");
        }
    }

    /**
     * @param $amount
     * @throws \Exception
     */
    public function spendCash($amount)
    {
        if (!is_numeric($amount) ) {throw new \Exception("Amount must be numeric");};
        if ($this->canSpendCash($amount)) {
            $cash = Cash::where('user_id', $this->getAuthUserId())->first();
            $cash->amount -= $amount;
            $cash->save();
        } else {
            throw new \Exception("Insufficient funds");
        }
    }

    /**
     * @param $amount
     * @return bool
     */
    public function canSpendCash ($amount) :bool
    {
        return $this->getUserCash() > $amount;
    }

    /**
     * @return float
     */
    public function getUserCash () :float
    {
        if (is_null(Cash::where('user_id', $this->getAuthUserId())->first())) {
            $this->createCashAccount(0);
        }
        return Auth::user()->cash->amount;
    }
}