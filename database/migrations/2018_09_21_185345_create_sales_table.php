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
	        $table->string('staff_id');
	        $table->string('company_id');
	        $table->datetime('sale_date')->nullable();
	        $table->string('invoice_number')->unique();
	        $table->string('customer_id')->nullable();
	        $table->unsignedInteger('tax_id')->nullable();
	        $table->string('total_amount')->nullable();
	        $table->string('delivery_cost')->nullable();
            $table->string('discount')->nullable();
            $table->enum('type', ['draft', 'published'])->default('draft');
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
