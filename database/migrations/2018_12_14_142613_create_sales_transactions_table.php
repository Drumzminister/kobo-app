<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('sales_date');
            $table->string('description');
            $table->string('quantity')->nullable();
            $table->string('inventory_id')->index();
            $table->integer('amount');
            $table->string('payment_mode_id')->index();
            $table->string('customer_id')->index();
            $table->string('sales_channel_id')->index();
            $table->integer('discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_transactions');
    }
}
