<?php

namespace Koboaccountant\Repositories\Company;
use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\User;
use Koboaccountant\Models\Company;
use Auth;
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
           'user_id' => Auth::user()->id,
           'name' => ucfirst($data['name']),
           'accountant_id' => 1
       ]);

       if(! $company) {
           return null;
       }
    }
}

