<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningCreditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_creditors', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->string('vendor');
            $table->string('details');
            $table->date('date');
            $table->decimal('amount', 11, 2);
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
        Schema::dropIfExists('opening_creditors');
    }
}
