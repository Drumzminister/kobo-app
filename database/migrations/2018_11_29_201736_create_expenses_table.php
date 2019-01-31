<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('expenses');
        Schema::create('expenses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id');
            $table->string('company_id');
            $table->date('date');
            $table->text('details');
            $table->decimal('amount', 10, 2);
            $table->decimal('amount_paid', 15, 2)->default(0);
            $table->boolean('has_finished_payment')->default(false);
            $table->string('classification')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
