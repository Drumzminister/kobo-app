<?php

namespace Koboaccountant\Repositories\Opening;

use Illuminate\Http\Request;
use Koboaccountant\Models\OpeningAsset;
use Koboaccountant\Repositories\BaseRepository;
use Carbon\Carbon;

/**
 * 
 */
class AssetRepository extends BaseRepository
{
	
	function __construct()
	{
		parent::__construct(new OpeningAsset());
	}

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(Request $request)
    {
        $asset = $this->model;
        $asset->id = $this->generateUuid();
        $asset->name = $request->name;
        $asset->category = $request->category;
        $asset->date = new Carbon($request->date);
        $asset->price = $request->price;
        $asset->user_id = $request->user()->id;

        $asset->save();
        return $asset;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, Request $request)
    {
        $asset = $this->model::find($id);
        $asset->name = $request->name;
        $asset->price = $request->price;
        $asset->category = $request->category;

        $asset->save();
        return $asset;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $asset = $this->model->find($id);
        $asset->delete();
        return true;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $assets = $this->model->where('user_id', $this->getAuthUserId())->get();
        return $assets;
    }
}