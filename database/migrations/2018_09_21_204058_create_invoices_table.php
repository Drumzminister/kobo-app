<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->string('id');
            $table->string('quantity');
            $table->double('amount', 15, 4);
            $table->string('invoice_number')->nullable();
            $table->date('order_number');
            $table->datetime('date_raised');
            $table->date('due_at');
            $table->integer('customer_id');
            $table->text('notes')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->string('payment_method')->index();
            $table->string('category_id')->index();
            $table->tinyInteger('invoice_status_id')->index();
            $table->string('inventory_id')->index();
            $table->string('company_id')->index();
            $table->unique(['customer_id', 'deleted_at']);
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('sku')->nullable();
            $table->double('quantity', 7, 2);
            $table->double('price', 15, 4);
            $table->double('total', 15, 4);
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');

            $table->string('invoice_id')->index();
            $table->string('company_id')->index();
            $table->string('inventory_id')->index();
        });

        Schema::create('invoice_statuses', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');

            $table->string('company_id')->index();
        });

        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->string('id');
            $table->integer('company_id');
            $table->integer('invoice_id');
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

        Schema::create('invoice_histories', function (Blueprint $table) {
            $table->string('id'); 
            $table->boolean('notify');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->string('invoice_id')->index();  
            $table->tinyInteger('status_code_id')->index();
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
        Schema::drop('invoices');
        Schema::drop('invoice_items');
        Schema::drop('invoice_statuses');
        Schema::drop('invoice_payments');
        Schema::drop('invoice_histories');
    }
}
