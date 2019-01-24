<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifySaleItemsTableAddReversedItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('sale_items', function (Blueprint $table) {
		    $table->string('reversed_item_id', 36)->nullable()->after('type');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('sale_items', function (Blueprint $table) {
		    $table->dropColumn('reversed_item_id');
	    });
    }
}
