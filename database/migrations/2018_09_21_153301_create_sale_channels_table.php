<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleChannelsTable extends Migration
{
    /**
     * Run the migrations.
    *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_channels', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
	        $table->string('user_id');
	        $table->string('company_id');
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
        Schema::dropIfExists('sales_channels');
    }
}
