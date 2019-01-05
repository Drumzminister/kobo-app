<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/5/2018
 * Time: 9:03 PM
 */

namespace Koboaccountant\Repositories\Opening;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Koboaccountant\Models\OpeningCreditor;
use Koboaccountant\Repositories\BaseRepository;

class CreditorRepository extends BaseRepository
{
    function __construct()
    {
        parent::__construct(new OpeningCreditor());
    }

    public function create(Request $request)
    {
        $creditor = $this->model;
        $creditor->id = $this->generateUuid();
        $creditor->date = new Carbon($request->date);
        $creditor->user_id = $this->getAuthUserId();
        $creditor->fill($request->all());

        $creditor->save();
        return $creditor;
    }

    public function update($id, Request $request)
    {
        $creditor = $this->model::find($id);
        $creditor->update($request->all());

        $creditor->save();
        return $creditor;
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