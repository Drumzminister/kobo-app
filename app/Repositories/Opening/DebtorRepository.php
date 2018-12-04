<?php
/**
 * Created by James John James.
 * User: HP
 * Date: 12/3/2018
 * Time: 3:50 PM
 */

namespace Koboaccountant\Repositories\Opening;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Koboaccountant\Models\OpeningDebtor;
use Koboaccountant\Repositories\BaseRepository;

class DebtorRepository extends BaseRepository
{
    function __construct()
    {
        parent::__construct(new OpeningDebtor());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(Request $request)
    {
        $asset = $this->model;
        $asset->id = $this->generateUuid();
        $asset->company_name = $request->company_name;
        $asset->details = $request->details;
        $asset->date = new Carbon($request->date);
        $asset->amount = $request->amount;
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
        $asset->company_name = $request->company_name;
        $asset->amount = $request->amount;
        $asset->details = $request->details;

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