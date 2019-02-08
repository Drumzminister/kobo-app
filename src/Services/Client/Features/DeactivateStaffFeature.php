<?php

namespace App\Services\Client\Features;

use App\Domains\Staff\Jobs\DeactivateStaffJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class DeactivateStaffFeature extends Feature
{
    private $staffId;
    public function __construct($staffId)
    {
        $this->staffId = $staffId;
    }
    public function handle(Request $request)
    {
        return $this->run(DeactivateStaffJob::class, ['staffId' => $this->staffId]);
    }
}
