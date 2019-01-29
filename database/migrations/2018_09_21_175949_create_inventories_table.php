<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->string('id');
	        $table->string('company_id');
	        $table->string('vendor_id');
	        $table->string('user_id');
            $table->string('invoice_number')->unique();
	        $table->dateTime('delivered_date');
	        $table->string('attachment')->nullable();
	        $table->string('discount')->nullable();
	        $table->double('delivery_cost', 2)->nullable();
            $table->unsignedInteger('tax_id')->nullable();
            $table->double('total_amount', 2);
            $table->double('amount_paid', 2);
            $table->double('balance', 2);
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
        Schema::dropIfExists('inventories');
    }
}
