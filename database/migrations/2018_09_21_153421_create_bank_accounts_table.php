<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('number');
            $table->double('opening_balance', 15, 4)->default('0.0000');
            $table->string('bank_name')->nullable();
            $table->double('current_balance', 15, 4)->default('0.0000');
            $table->string('bank_phone')->nullable();
            $table->string('bank_address')->nullable();
            $table->boolean('isActive')->default(1);
            $table->string('company_id')->index();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('bank_accounts');
    }
}
