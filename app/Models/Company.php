<?php

namespace Koboaccountant\Models;

// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public $incrementing = false;
    
    protected $fillable = [ 'id', 'name', 'user_id', 'accountant_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function sales()
    {
        return $this->hasMany('Koboaccountant\Models\Sales', 'company_id');
    }
    // public function accountant(){
    // 	return $this->hasOne('Koboaccountant\Models\User',  'accountant_id');
    // }

}
