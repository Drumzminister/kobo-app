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

    public function createCashAccount ($amount)
    {
        $cash = new Cash();
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
            throw new \Exception("Cash available is not enough for the transaction you're trying to perform");
        }
    }

    /**
     * @param $amount
     * @return bool
     */
    public function canSpendCash ($amount) :bool
    {
        if ($this->getUserCash() > $amount) {
            return true;
        }
        return false;
    }

    /**
     * @return float
     */
    public function getUserCash () :float
    {
        return Auth::user()->cash->amount;
    }
}