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
<<<<<<< HEAD
            $table->double('sales_price')->default(0.0000);
            $table->double('purchase_price')->default(0.0000);            
            $table->string('quantity');
            $table->string('description')->nullable();
            $table->timestamp('delivered_date');
            $table->string('attachment')->nullable();
            $table->string('vendor_id')->index();
            $table->string('user_id')->index();
=======
	        $table->string('company_id');
	        $table->string('vendor_id');
	        $table->string('user_id');
	        $table->double('sales_price')->default(0.0000);
	        $table->double('purchase_price')->default(0.0000);
	        $table->string('quantity');
	        $table->string('description');
	        $table->dateTime('delivered_date');
	        $table->string('attachment')->nullable();
>>>>>>> b1926513f517e8a008f659ab33fbaf5772f58534
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
