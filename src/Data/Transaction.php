<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	public $incrementing = false;

	protected $fillable = [];

	public function sale()
	{
	}

	public function expense()
	{
	}

	public function purchase()
	{
	}

	public function inventory()
	{
	}
}
