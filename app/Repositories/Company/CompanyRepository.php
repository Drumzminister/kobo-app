<?php

namespace Koboaccountant\Repositories\Company;
use Koboaccountant\Http\Requests\CompanyRequest;
use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyRepository extends BaseRepository
{
    public function __construct(Company $company)
    {
         $this->companyModel = $company; 
    }

    public function createCompany($data)
   {
       // Request has been created for validation
       if(is_array($data))
            $data = (Object) $data;

       return $company = Company::create([
           'id' => $this->generateUuid(),
           'user_id' => $this->authUserId(),
           'name' => ucfirst($data->name),
       ]);

       if(!$company) {
           return null;
       }
    }
}

