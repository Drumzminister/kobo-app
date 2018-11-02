<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->string('id');
            $table->string('bill_number');
            $table->string('order_number')->nullable();
            $table->date('due_at');
            $table->double('amount', 15, 4);
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->primary('id');

            $table->string('vendor_id')->index();
            $table->string('company_id')->index();

        });

        Schema::create('bill_items', function (Blueprint $table) {
            $table->string('id', 100);
            $table->integer('item_id')->nullable();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->double('quantity', 7, 2);
            $table->double('price', 15, 4);
            $table->double('total', 15, 4);
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
            $table->string('company_id')->index();
        });

        Schema::create('bill_statuses', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->string('company_id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
            $table->index('company_id');
        });

        Schema::create('bill_payments', function (Blueprint $table) {
            $table->string('id', 100);
            $table->integer('bill_id');
            $table->integer('account_id');
            $table->date('paid_at');
            $table->double('amount', 15, 4);
            $table->text('description')->nullable();
            $table->string('reference')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->string('payment_method_id')->index();
            $table->string('company_id')->index();
        });

        Schema::create('bill_histories', function (Blueprint $table) {
            $table->string('id', 100);
            $table->integer('bill_id');
            $table->string('status_code');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->string('company_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills');
        Schema::drop('bill_items');
        Schema::drop('bill_statuses');
        Schema::drop('bill_payments');
        Schema::drop('bill_histories');
    }
}
