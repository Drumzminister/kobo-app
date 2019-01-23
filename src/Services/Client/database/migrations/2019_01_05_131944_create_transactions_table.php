<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('bank_detail_id', 36);
            $table->string('kobo_id', 36)->unique();
            $table->string('company_id', 36);
            $table->string('sale_id', 36)->nullable();
            $table->string('loan_id', 36)->nullable();
            $table->string('expense_id', 36)->nullable();
            $table->string('inventory_id', 36)->nullable();
            $table->unsignedInteger('transaction_category_id')->nullable();
            $table->double('amount')->default(0);
            $table->text('note')->nullable();
            $table->boolean('isProcessed')->default(0);
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
        Schema::dropIfExists('transactions');
    }
}
