<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->string('id', 100);
            $table->double('amount', 7, 4)->default(0.0000);
            $table->text('description');
            $table->string('attachment');
            

            $table->primary('id');
            
            $table->string('company_id')->index();
            $table->string('account_id')->index();
            $table->string('customer_id')->index();
            $table->string('category_id')->index();
            $table->tinyInteger('payment_method_id')->index();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revenues');
    }
}
