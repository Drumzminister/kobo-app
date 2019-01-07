<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('expense_id')->references('id')->on('expenses');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('transaction_category_id')->references('id')->on('transaction_categories');
        });

	    Schema::table('transaction_categories', function (Blueprint $table) {
		    $table->foreign('user_id')->references('id')->on('users');
	    });

	    Schema::table('staff', function (Blueprint $table) {
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->foreign('company_id')->references('id')->on('companies');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_expense_id_foreign');
            $table->dropForeign('transactions_purchase_id_foreign');
            $table->dropForeign('transactions_inventory_id_foreign');
            $table->dropForeign('transactions_sale_id_foreign');
            $table->dropForeign('transactions_category_id_foreign');
        });

	    Schema::table('transaction_categories', function (Blueprint $table) {
		    $table->dropForeign('transaction_categories_user_id_foreign');
	    });

	    Schema::table('staff', function (Blueprint $table) {
		    $table->dropForeign('staff_company_id_foreign');
		    $table->dropForeign('staff_user_id_foreign');
	    });
    }
}
