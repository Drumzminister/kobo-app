<?php

namespace Koboaccountant\Traits;


use Koboaccountant\Foundation\JobResponse;

trait HelpsResponse
{
	private function createJobResponse(string $status, string $message, $data = null): JobResponse
	{
		return new JobResponse($status, $message, $data);
	}
}