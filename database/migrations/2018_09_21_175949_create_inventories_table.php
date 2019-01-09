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
            $table->string('name');
	        $table->string('company_id');
	        $table->string('vendor_id');
	        $table->string('user_id');
	        $table->double('sales_price')->default(0.0000);
	        $table->double('purchase_price')->default(0.0000);
	        $table->string('quantity');
	        $table->string('description');
	        $table->dateTime('delivered_date');
	        $table->string('attachment')->nullable();
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
