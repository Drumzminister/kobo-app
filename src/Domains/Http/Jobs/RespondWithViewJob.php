<?php

namespace App\Domains\Http\Jobs;

use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Job;
use Illuminate\Routing\ResponseFactory;

class RespondWithViewJob extends Job
{
    protected $status;
    protected $data;
    protected $headers;
    protected $template;

    public function __construct($template, $data = [], $status = 200, array $headers = [])
    {
        $this->template = $template;
        $this->data = $data;
        $this->status = $status;
        $this->headers = $headers;
    }

    public function handle(ResponseFactory $factory)
    {
	    $this->getAuthData();
        return $factory->view($this->template, $this->data, $this->status, $this->headers);
    }

	public function getAuthData()
	{
		if (Auth::check()) {
			$this->data['user'] = Auth::user();
			$this->data['company'] = auth()->user()->company;
		}
	}
}
