<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/5/2019
 * Time: 11:05 PM
 */

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public $incrementing = false;
    protected $fillable = ['amount', 'start', 'end', 'property_details', 'other_costs', 'comment'];
}
