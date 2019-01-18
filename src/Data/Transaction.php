<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Company;
use Koboaccountant\Models\Expense;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\Sale;

class Transaction extends Model
{
	public $incrementing = false;

	protected $fillable = [
		'id', 'kobo_id', 'sale', 'expense_id', 'purchase_id', 'inventory_id', 'amount',
		'company_id', 'loan_id', 'transaction_category_id', 'note', 'isProcessed'
	];

	public function sale()
	{
		return $this->belongsTo(Sale::class, 'sale_id');
	}

	public function expense()
	{
		return $this->belongsTo(Expense::class, 'expense_id');
	}

	public function purchase()
	{
		return $this->belongsTo(Purchase::class, 'purchase_id');
	}

	public function inventory()
	{
		return $this->belongsTo(Inventory::class, 'inventory_id');
	}

	public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

	public function category()
	{
		return $this->belongsTo(TransactionCategory::class, 'transaction_category_id');
	}

	public function paymentMode()
	{
		return $this->belongsTo(BankDetail::class, 'bank_detail_id');
	}
}
