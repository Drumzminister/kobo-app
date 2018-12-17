<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/13/2018
 * Time: 11:14 PM
 */

namespace Koboaccountant\Repositories\Rent;


use Illuminate\Http\Request;
use Koboaccountant\Models\Rent;
use Koboaccountant\Repositories\BaseRepository;

class RentRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Rent());
    }

    public function create(Request $request)
    {
        $rent = $this->model;
        $rent->id = $this->generateUuid();
        $rent->user_id = $this->getAuthUserId();
        $rent->fill($request->all());
        $rent->save();
    }

}