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
            $table->timestamp('sales_date');
            $table->string('name');
            $table->string('quantity')->nullable();
            $table->string('inventory_id')->index();
            $table->integer('amount');
            $table->string('company_id')->index();
            $table->string('staff_id')->index();
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
