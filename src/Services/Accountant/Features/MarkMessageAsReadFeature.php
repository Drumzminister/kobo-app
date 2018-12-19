<?php

namespace App\Services\Accountant\Features;

use Illuminate\Http\Request;
use Lucid\Foundation\Feature;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\Chat\Jobs\MarkMessageAsReadJob;
use App\Domains\Http\Jobs\RespondWithJsonErrorJob;

class MarkMessageAsReadFeature extends Feature
{
	private $messageId;

	/**
	 * MarkMessageAsReadFeature constructor.
	 *
	 * @param $messageId
	 */
	public function __construct($messageId)
	{
		$this->messageId = $messageId;
	}

	public function handle(Request $request)
    {
		$read = $this->run(MarkMessageAsReadJob::class, ['messageId' => $this->messageId]);

		if ($read) {
			return $this->run(new RespondWithJsonJob(['status' => 'success']));
		}

	    return $this->run(new RespondWithJsonErrorJob(['status' => 'error']));
    }
}
