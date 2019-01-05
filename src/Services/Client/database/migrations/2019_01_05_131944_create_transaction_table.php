<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('kobo_id', 36)->unique();
            $table->string('sale_id', 36)->nullable();
            $table->string('expense_id', 36)->nullable();
            $table->string('purchase_id', 36)->nullable();
            $table->string('inventory_id', 36)->nullable();
            $table->string('category_id', 36)->nullable();
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
        Schema::dropIfExists('transaction');
    }
}
