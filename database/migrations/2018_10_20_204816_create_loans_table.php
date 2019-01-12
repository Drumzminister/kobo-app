<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id');
            $table->string('company_id');
            $table->text('description');
            $table->string('loan_source_id');
            $table->decimal('amount', 15, 2);
            $table->decimal('amount_paid', 15, 2)->default(0);
            $table->decimal('interest', 5, 2);
            $table->enum('period', ['week', 'month', 'year']);
            $table->integer('term');
            $table->integer('payment_interval');
            $table->date('start_date');
            $table->enum('status', ['running', 'completed'])->default('running');
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
        Schema::dropIfExists('loans');
    }
}
