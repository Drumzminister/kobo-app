<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountantClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountant_clients', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('client_id', 36);
            $table->string('accountant_id', 36);
            $table->timestamps();

            $table->primary('id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('accountant_id')->references('id')->on('accountants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountant_clients');
    }
}
