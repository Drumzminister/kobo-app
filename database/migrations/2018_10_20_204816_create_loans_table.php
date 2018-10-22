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
            $table->string('id');
            $table->string('company_id')->index();
            $table->string('name');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('duration');
            $table->double('amount')->default(4, 7);
            $table->string('purpose');
            $table->enum('isActive', ['active', 'closed'])->default('active');
            $table->timestamps();
        });

        Schema::create('loan_transactions', function (Blueprint $table) {
            $table->string('id');
            $table->string('loan_id')->index();
            $table->integer('duration');
            $table->double('amount');
            $table->datetime('paid_date');
            $table->string('trasaction_type');
            $table->string('bank_name');
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
        Schema::dropIfExists('loan_transactions');        
        Schema::dropIfExists('loans');
    }
}
