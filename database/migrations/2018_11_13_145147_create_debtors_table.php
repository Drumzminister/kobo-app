<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debtors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_id');
            $table->string('customer_id');
            $table->decimal('amount', 15, 2)->default(0);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debtors');
    }
}
