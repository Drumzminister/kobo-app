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
use Koboaccountant\Models\OpeningInventory;
use Koboaccountant\Repositories\BaseRepository;

class InventoryRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new OpeningInventory());
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

    public function getAll()
    {
        return $this->model->where('user_id', $this->getAuthUserId())->get();
    }
}