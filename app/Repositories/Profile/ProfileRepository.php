<?php

namespace Koboaccountant\Repositories\Profile;



use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\User;

class ProfileRepository extends BaseRepository
{
    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function add($data)
    {
        $profile = new Profile;
        $profile->
    }

}