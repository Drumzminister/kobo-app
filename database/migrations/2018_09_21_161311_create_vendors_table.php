<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->string('id', 100);
            $table->string('name');
            $table->text('address');
            $table->string('phone', 11);
            $table->string('email');
            $table->string('website');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
            
            $table->string('company_id')->index();
            $table->string('user_id')->index();

            $table->unique(['company_id', 'user_id', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
