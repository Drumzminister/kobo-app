<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/13/2018
 * Time: 5:42 PM
 */

namespace Koboaccountant\Repositories\Opening;


use Koboaccountant\Models\Cash;
use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Traits\CashTransactions;

class CashRepository extends BaseRepository
{
    use CashTransactions;

    public function __construct()
    {
        parent::__construct(new Cash());
    }
}