<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/14/2018
 * Time: 6:09 PM
 */

namespace Koboaccountant\Contracts;


interface Transaction
{
    public function create ();
    public function update ();
}