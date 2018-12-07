<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_inventories', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->date('date');
            $table->string('vendor');
            $table->string('details');
            $table->integer('quantity');
            $table->decimal('cost_price', 11, 2);
            $table->decimal('selling_price', 11, 2);
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
        Schema::dropIfExists('opening_inventories');
    }
}
