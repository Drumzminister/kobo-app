<?php

namespace Koboaccountant;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = ['tag' => 'array'];
    protected $fillable = ['name', 'tag', 'description', 'user_id', 'company_id', 'attachment', 'low_quantity'];
}
