<?php
use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\Role;
use Koboaccountant\Models\Company;

class CompanyRepository extends BaseRepository
{
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function add()
    {
        
    }

}

