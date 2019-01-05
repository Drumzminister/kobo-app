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
    }
}
