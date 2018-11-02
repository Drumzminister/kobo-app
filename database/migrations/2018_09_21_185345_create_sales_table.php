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
            $table->text('description')->nullable();
            $table->date('sales_date');
            $table->string('quantity');
            $table->string('customer_id');
            $table->string('inventory_id');
            $table->string('catogory')->nullable();
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
