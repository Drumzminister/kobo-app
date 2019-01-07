<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->string('id');
	        $table->string('company_id')->index();
	        $table->string('name');
	        $table->text('address');
	        $table->string('phone');
	        $table->string('email');
	        $table->string('website');
	        $table->boolean('isActive')->default(1);
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
        Schema::dropIfExists('vendors');
    }
}
