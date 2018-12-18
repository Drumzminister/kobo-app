<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/17/2018
 * Time: 12:15 AM
 */

namespace Koboaccountant\Repositories\Cash;


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