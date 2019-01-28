<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('sales', function (Blueprint $table) {
		    $table->double('balance', 2)->default(0.00)->after('total_amount');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('sales', function (Blueprint $table) {
		    $table->dropColumn('balance');
	    });
    }
}
