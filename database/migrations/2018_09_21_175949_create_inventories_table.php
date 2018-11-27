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
            $table->double('sales_price')->default(0.0000);
            $table->double('purchase_price')->default(0.0000);            
            $table->string('quantity');
            $table->string('description');
            $table->timestamp('delivered_date');
            $table->string('attachment')->nullable();
            $table->string('vendor_id')->index();
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
