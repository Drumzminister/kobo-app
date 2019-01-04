<?php

namespace Koboaccountant\Repositories\Client;



use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\User;
use Koboaccountant\Models\SubscriptionPlan;
use Koboaccountant\Models\Accountant;

class ProfileRepository extends BaseRepository
{
    protected $user;
    protected $subscription;
    protected $accountant;

    function __construct(Client $client, User $user, SubscriptionPlan $subscription, Accountant $accountant)
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