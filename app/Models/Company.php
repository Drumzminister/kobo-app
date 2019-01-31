<?php

namespace Koboaccountant\Models;

// use Cviebrock\EloquentSluggable\Sluggable;
use App\Data\BankDetail;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
//    use Sluggable;
	use Cachable;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $incrementing = false;

    protected $fillable = ['id', 'name', 'user_id', 'accountant_id'];

    protected $with = ['customers', 'staffs', 'inventories', 'saleChannels', 'banks',];

//    public function sluggable()
//    {
//        return [
//            'slug' => [
//                'source' => 'name',
//            ],
//        ];
//    }

    public function sales()
    {
        return $this->hasMany('Koboaccountant\Models\Sale');
    }

    public function vendors()
    {
        return $this->hasMany('Koboaccountant\Models\Vendor');
    }

    public function customers()
    {
        return $this->hasMany('Koboaccountant\Models\Customer');
    }

    public function staffs()
    {
        return $this->hasMany('Koboaccountant\Models\Staff');
    }

    public function user()
    {
        return $this->belongsTo('Koboaccountant\Models\User');
    }

    public function inventories()
    {
    	return $this->hasMany(Inventory::class);
    }

    public function saleChannels()
    {
    	return $this->hasMany(SaleChannel::class);
    }

    public function banks()
    {
    	return $this->hasMany(BankDetail::class);
    }
}
