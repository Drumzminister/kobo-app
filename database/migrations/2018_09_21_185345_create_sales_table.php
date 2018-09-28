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
            $table->string('id', 100);
            $table->text('description');
            $table->date('sales_date');
            $table->string('attachment');
            $table->string('customer_id');
            $table->string('inventory_id');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');

            $table->index(['customer_id', 'inventory_id']);
            
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
