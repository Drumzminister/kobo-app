<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/5/2018
 * Time: 9:43 PM
 */

namespace Koboaccountant\Repositories\Opening;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Repositories\BaseRepository;

class InventoryRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Inventory());
    }

    public function inventory()
    {
        return $this->model::where('user_id', $this->getAuthUserId());
    }


    public function getInventory()
    {
        if(!is_null(Auth::user())){
            $inventory = $this->model->where('user_id', $this->getAuthUserId());
            return $inventory;
        }
        return [];
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $assets = $this->model->where('user_id', $this->getAuthUserId())->get();
        return $assets;
    }

    public function create(Request $request)
    {
        $inventory = $this->model;
        $inventory->id = $this->generateUuid();
        $inventory->date = new Carbon($request->date);
        $inventory->user_id = $this->getAuthUserId();
        $inventory->fill($request->all());

        $inventory->save();
        return $inventory;
    }

    public function update($id, Request $request)
    {
        $inventory = $this->model::find($id);
        $inventory->update($request->all());

        $inventory->save();
        return $inventory;
    }

    public function delete($id)
    {
        $this->model::find($id)->delete();
    }
}