<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/14/2018
 * Time: 11:02 PM
 */

namespace Koboaccountant\Repositories\Transactions;


use Koboaccountant\Contracts\TransactionInterface;
use Koboaccountant\Models\CashTransaction;
use Koboaccountant\Repositories\BaseRepository;

class CashTransactionRepository extends BaseRepository implements TransactionInterface
{
    public function __construct()
    {
        parent::__construct(new CashTransaction());
    }

    public function create(array $data)
    {
        $transaction = $this->model;
        $transaction->id = $this->generateUuid();
        $transaction->user_id = $this->getAuthUserId();
        $transaction->description = "A ". $data['class'] . " transaction happened." ;
        $transaction->class = $data['class'];
        $transaction->class_id = $data['class_id'];
        $transaction->amount = $data['amount'];
        $transaction->save();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}