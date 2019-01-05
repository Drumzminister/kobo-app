<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string('id');
            $table->string('user_id');
            $table->string('accountant_id');
            $table->string('attachment')->nullable();
            $table->tinyInteger('subscription_plan_id')->index();
            $table->string('business_name');
            $table->string('business_address');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
	        $table->foreign('accountant_id')->references('id')->on('accountants');
	        $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
