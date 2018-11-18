<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('id');
            $table->date('sales_date');
            $table->string('quantity')->nullable();
            $table->string('inventory_id')->index();
            $table->integer('amount');
            $table->string('company_id')->index();
            $table->string('staff_id')->index();
            // $table->string('customer_id')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
