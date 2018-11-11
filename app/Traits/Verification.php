<?php

namespace Koboaccountant\Traits;
use Koboaccountant\Models\VerifyUser;
use Koboaccountant\Models\User;

trait Verification
{
	public function getUserByToken($token)
	{
		return VerifyUser::where('token', $token)->first() ?? null;
	}

	public function isVerified(User $user) : bool
	{
		return $user->verified;
	}

	public function verifyUser(User $user) : void
	{
		$user->verified = true;
		$user->save();
	}
}