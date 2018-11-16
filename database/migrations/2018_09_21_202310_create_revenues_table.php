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
            $table->string('id');
            $table->double('amount', 7, 4)->default(0.0000);
            $table->text('description');
            $table->string('attachment');           
            $table->string('company_id')->index();
            $table->string('customer_id')->index();
            $table->string('revenue_category_id')->index();
            $table->tinyInteger('payment_method_id')->index();
            
            $table->softDeletes();
            $table->timestamps();
            
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
        Schema::dropIfExists('revenues');
    }
}
