<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->double('price', 7, 4)->default(0.0000);
            $table->string('quantity');
            $table->text('description');
            $table->date('delivered_date');
            $table->string('attachment');
            $table->softDeletes();
            $table->timestamps();

            $table->primary('id');

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
        Schema::dropIfExists('inventories');
    }
}
