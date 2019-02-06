<?php
namespace App\Data\Repositories;

use App\Data\Repositories\Repository;
use Koboaccountant\Product;

class ProductRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Product());
    }
}
