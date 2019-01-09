<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/9/2019
 * Time: 1:07 PM
 */

namespace App\Data;


use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Company;

class LoanSource extends Model
{
    public $incrementing = false;
    protected $fillable = ['name', 'id', 'company_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('Koboaccountant\Models\User', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function loans()
    {
        return $this->hasMany('Koboaccountant\Models\Loan', 'loan_source_id');
    }
}
