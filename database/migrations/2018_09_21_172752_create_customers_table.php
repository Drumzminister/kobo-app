<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('id', 100);
            $table->string('name');
            $table->string('email');
            $table->text('address');
            $table->string('phone');
            $table->string('website');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('customers');
    }
}
