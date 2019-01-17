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
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('transaction_category_id')->references('id')->on('transaction_categories');
        });

        Schema::table('rents', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('staff_id')->references('id')->on('users');
        });

        Schema::table('rent_payments', function (Blueprint $table) {
            $table->foreign('rent_id')->references('id')->on('rents');
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('loan_source_id')->references('id')->on('loan_sources');
        });

        Schema::table('loan_sources', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('cashes', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });

	    Schema::table('transaction_categories', function (Blueprint $table) {
		    $table->foreign('user_id')->references('id')->on('users');
	    });

	    Schema::table('expenses', function(Blueprint $table) {
	        $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
        });

	    Schema::table('staff', function (Blueprint $table) {
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->foreign('company_id')->references('id')->on('companies');
	    });

	    Schema::table('inventories', function (Blueprint $table) {
		    $table->foreign('vendor_id')->references('id')->on('vendors');
		    $table->foreign('company_id')->references('id')->on('companies');
		    $table->foreign('user_id')->references('id')->on('users');
	    });

	    Schema::table('sale_channels', function (Blueprint $table) {
		    $table->foreign('company_id')->references('id')->on('companies');
		    $table->foreign('user_id')->references('id')->on('users');
	    });

	    Schema::table('sales', function (Blueprint $table) {
		    $table->foreign('company_id')->references('id')->on('companies');
		    $table->foreign('staff_id')->references('id')->on('staff');
		    $table->foreign('tax_id')->references('id')->on('taxes');
		    $table->foreign('customer_id')->references('id')->on('customers');
		    $table->foreign('sale_channel_id')->references('id')->on('sale_channels');
	    });

	    Schema::table('sale_items', function (Blueprint $table) {
		    $table->foreign('sale_id')->references('id')->on('sales');
		    $table->foreign('inventory_id')->references('id')->on('inventories');
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
            $table->dropForeign('transactions_loan_id_foreign');
            $table->dropForeign('transactions_category_id_foreign');
            $table->dropForeign('transactions_company_id_foreign');
        });

	    Schema::table('transaction_categories', function (Blueprint $table) {
		    $table->dropForeign('transaction_categories_user_id_foreign');
	    });

	    Schema::table('staff', function (Blueprint $table) {
		    $table->dropForeign('staff_company_id_foreign');
		    $table->dropForeign('staff_user_id_foreign');
	    });

	    Schema::table('inventories', function (Blueprint $table) {
		    $table->dropForeign('inventories_company_id_foreign');
		    $table->dropForeign('inventories_vendor_id_foreign');
		    $table->dropForeign('inventories_user_id_foreign');
	    });

	    Schema::table('sale_channels', function (Blueprint $table) {
		    $table->dropForeign('sale_channels_company_id_foreign');
		    $table->dropForeign('sale_channels_user_id_foreign');
	    });

	    Schema::table('sales', function (Blueprint $table) {
		    $table->dropForeign('sales_company_id_foreign');
		    $table->dropForeign('sales_staff_id_foreign');
		    $table->dropForeign('sales_tax_id_foreign');
		    $table->dropForeign('sales_company_id_foreign');
		    $table->dropForeign('sales_sale_channel_id_foreign');
	    });

	    Schema::table('sale_items', function (Blueprint $table) {
		    $table->dropForeign('sale_items_sale_id_foreign');
		    $table->dropForeign('sale_items_inventory_id_foreign');
	    });

        Schema::table('rents', function (Blueprint $table) {
            $table->dropForeign('rents_company_id_foreign');
            $table->dropForeign('rents_staff_id_foreign');
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->dropForeign('loans_company_id_foreign');
            $table->dropForeign('loans_user_id_foreign');
            $table->dropForeign('loans_loan_source_id_foreign');
        });
    }
}
