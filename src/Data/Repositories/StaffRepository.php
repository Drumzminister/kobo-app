<?php

namespace App\Data\Repositories;


use Koboaccountant\Models\Staff;

class StaffRepository extends Repository
{
    public function __construct() {
        parent::__construct(new Staff);
    }
}
