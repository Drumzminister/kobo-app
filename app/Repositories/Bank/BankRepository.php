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

    public function getAll()
    {
        return Bank::all();
    }
    public function search ($query)
    {
        return $this->model->where('user_id', $this->getAuthUserId())->where('bank_name', 'like', '%'. $query .'%')->get();
    }
}