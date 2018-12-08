<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->string('id');
	        $table->string('client_id');
	        $table->string('accountant_id');
	        $table->string('item');
	        $table->string('actual_amount');
	        $table->string('projected_amount');
	        $table->text('assumptions');
	        $table->text('expense_id');
            $table->timestamps();

            $table->primary('id');
            $table->foreign(['client_id', 'accountant_id', 'expense_id'])->references(['id', 'id', 'id'])->on(['clients', 'accountants', 'expenses']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
}
