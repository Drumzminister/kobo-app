<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/15/2018
 * Time: 10:22 PM
 */

namespace Koboaccountant\Repositories\Bank;


use App\Data\BankDetail;
use Koboaccountant\Models\Bank;
use Koboaccountant\Repositories\BaseRepository;

class BankRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new BankDetail());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Bank[]|mixed
     */
    public function getAll()
    {
        return Bank::all();
    }

    /**
     * @param $query
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function search ($query)
    {
        return $this->model->where('user_id', $this->getAuthUserId())->where('bank_name', 'like', '%'. $query .'%')->get();
    }

    /**
     * @param $amount
     * @param $bank
     * @return bool
     */
    public function canSpend($amount, $bank): bool
    {
        return $bank->account_balance >= $amount;
    }

    /**
     * @param $amount
     * @param $bank
     * @throws \Exception
     */
    public function spend($amount, $bank)
    {
        if ($this->canSpend($amount, $bank))
        {
            $bank->account_balance -= floatval($amount);
            $bank->save();
        } else {
            throw new \Exception("Insufficient funds");
        }
    }

    public function add ($amount, $bank)
    {
        $bank->account_balance += floatval($amount);
        $bank->save();
    }

    public function getAuthUserBanks ()
    {
        return $this->model::where('user_id', $this->getAuthUserId())->get();
    }
}