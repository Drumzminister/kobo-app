<?php

namespace Koboaccountant\Repositories\SalesChannel;

use Illuminate\Support\Facades\Auth;
use Koboaccountant\Models\SalesChannel;
use Koboaccountant\Repositories\BaseRepository;

class SalesChannelRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new SalesChannel());

    }

    public function allSalesChannel()
    {
        if (!is_null(Auth::user())) {
            $salesChannel = $this->model->where('user_id', $this->getAuthUserId())->get();
            return $salesChannel;
        }

        return [];
    }

    public function create(Request $request)
    {
        $salesChannel = $this->model;
        $salesChannel->id = $this->generateUuid();
        $salesChannel->name = $request->name;
        $salesChannel->save();
        return $asset;
    }

    public function update($id, Request $request)
    {
        $salesChannel = $this->model::find($id);
        $salesChannel->name = $request->name;
        $salesChannel->save();
        return $salesChannel;
    }

    public function delete($id)
    {
        $salesChannel = $this->model->find($id);
        $salesChannel->delete();
        return true;
    }

}
