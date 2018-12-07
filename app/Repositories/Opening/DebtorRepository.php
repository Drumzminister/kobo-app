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
        $debtor = $this->model;
        $debtor->id = $this->generateUuid();
        $debtor->company_name = $request->company_name;
        $debtor->details = $request->details;
        $debtor->date = new Carbon($request->date);
        $debtor->amount = $request->amount;
        $debtor->user_id = $request->user()->id;

        $debtor->save();
        return $debtor;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, Request $request)
    {
        $debtor = $this->model::find($id);
        $debtor->company_name = $request->company_name;
        $debtor->amount = $request->amount;
        $debtor->details = $request->details;

        $debtor->save();
        return $debtor;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $debtor = $this->model->find($id);
        $debtor->delete();
        return true;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $debtors = $this->model->where('user_id', $this->getAuthUserId())->get();
        return $debtors;
    }
}