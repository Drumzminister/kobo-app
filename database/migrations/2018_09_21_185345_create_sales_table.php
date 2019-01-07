<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('id');
//            $table->string('sales_transaction_id')->index();
            $table->string('invoice_number');
            $table->string('customer_id')->index();
            $table->string('delivery_cost');
            $table->string('user_id')->index();
            $table->string('tax_id');
            $table->string('discount')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
