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
	        $table->string('company_id');
            $table->string('user_id');
            $table->string('name');
	        $table->text('address');
	        $table->string('phone');
	        $table->string('email');
	        $table->string('image')->nullable();
	        $table->string('website')->nullable();
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
