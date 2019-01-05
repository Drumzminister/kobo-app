<?php

namespace Koboaccountant\Repositories\Profile;



use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\User;

class ProfileRepository extends BaseRepository
{
    protected $user;

    public function __construct()
    {
        parent::__construct(new User());
    }

    public function getId()
    {
        return $this->getAuthUserId();
    }
}