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
            $table->string('id', 36)->unique();
            $table->string('client_id', 36)->index();
            $table->string('accountant_id', 36)->index();
            $table->timestamps();

            $table->primary('id');

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');

            $table->foreign('accountant_id')
                ->references('id')
                ->on('accountants')
                ->onDelete('cascade');

            $table->unique(['client_id', 'accountant_id']);
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
