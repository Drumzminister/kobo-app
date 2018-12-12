<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/10/2018
 * Time: 8:29 AM
 */

namespace Koboaccountant\Repositories\Loan;

use Illuminate\Http\Request;
use Koboaccountant\Models\LoanSource;
use Koboaccountant\Repositories\BaseRepository;

class SourceRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new LoanSource());
    }

    public function create(Request $request)
    {
        $source = $this->model;
        $source->id = $this->generateUuid();
        $source->user_id = $this->getAuthUserId();
        $source->fill($request->all());

        $source->save();
        return $source;
    }

    public function edit($id, Request $request)
    {
        $source = $this->model::find($id);
        $source->update($request->all());

        $source->save();
        return $source;
    }

    public function delete($id)
    {
        $this->model::find($id)->delete();
    }

    public function getAll()
    {
        return $this->model->where('user_id', $this->getAuthUserId())->get();
    }

    public function search($query)
    {
        return $this->model->where('user_id', $this->getAuthUserId())->where('name', 'like', '%'. $query .'%')->get();
    }

}