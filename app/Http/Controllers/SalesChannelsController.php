<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\SalesChannel\SalesChannelRepository;

class SalesChannelsController extends Controller
{

    public function __construct(SalesChannelRepository $salesChannel)
    {
        $this->salesChannels = $salesChannel;
    }

    public function getAll()
    {
        $salesChannels = $this->salesChannels->allSalesChannel();
        return $salesChannels;
    }
}
