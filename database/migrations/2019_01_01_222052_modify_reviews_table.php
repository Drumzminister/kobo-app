<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('company_reviews', function (Blueprint $table) {
		    $table->foreign('company_id')->references('id')->on('companies');
	    });

	    Schema::table('accountant_reviews', function (Blueprint $table) {
		    $table->foreign('accountant_id')->references('id')->on('accountants');
		    $table->foreign('client_id')->references('id')->on('clients');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('company_reviews', function (Blueprint $table) {
		    $table->dropForeign('company_id');
	    });

	    Schema::table('accountant_reviews', function (Blueprint $table) {
		    $table->dropForeign('accountant_reviews_accountant_id_foreign');
		    $table->dropForeign('accountant_reviews_client_id_foreign');
	    });
    }
}
