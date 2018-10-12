<?php

namespace Koboaccountant\Repositories\Client;



use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\User;
use Koboaccountant\Models\SubcriptionPlan;
use Koboaccountant\Models\Accountant;

class ProfileRepository extends BaseRepository
{
    protected $user;
    protected $subscription;
    protected $accountant;

    function __construct(Client $client, User $user, SubcriptionPlan $subscription, Accountant $accountant)
    {
        $this->user = $user;
        $this->accountant = $accountant;
        $this->subscription = $subscription;
    }

    public function add($data)
    {
        $client = new Client;
    }

}