<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/14/2018
 * Time: 6:09 PM
 */

namespace Koboaccountant\Contracts;


interface TransactionInterface
{
    public function create (array $data);
    public function update ();
}