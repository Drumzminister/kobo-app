<?php

namespace App\Domains\Accountant\Jobs;

use App\Data\Repositories\ReviewRepository;
use Lucid\Foundation\Job;

class AddClientReviewJob extends Job
{
	/**
	 * @var array
	 */
	private $data;

	/**
	 * @var \Illuminate\Foundation\Application|ReviewRepository
	 */
	private $review;

	/**
	 * Create a new job instance.
	 *
	 * @param array $data
	 */
    public function __construct(array $data)
    {
	    $this->data = $data;
	    $this->review = app(ReviewRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
		return $this->review->fillAndSave($this->data);
    }
}
