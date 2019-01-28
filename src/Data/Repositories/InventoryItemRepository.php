<?php

namespace App\Data\Repositories;


use App\Data\InventoryItem;

class InventoryItemRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new InventoryItem);
    }

}
