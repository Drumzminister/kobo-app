<?php

namespace App\Domains\Accountant\Jobs;

use App\Data\Repositories\ClientRepository;
use Lucid\Foundation\Job;

class GetAllAccountantClientJob extends Job
{
	/**
	 * @var string
	 */
	private $accountantId;

	/**
	 * @var \Illuminate\Foundation\Application|ClientRepository
	 */
	private $client;

	/**
	 * Create a new job instance.
	 *
	 * @param string $accountantId
	 */
    public function __construct(string $accountantId)
    {
	    $this->accountantId = $accountantId;
	    $this->client = app(ClientRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return $this->client->getByAttributes(['accountant_id' => $this->accountantId]);
    }
}
