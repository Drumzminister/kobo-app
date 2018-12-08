<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAccountantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('accountants', function (Blueprint $table) {
		    $table->string('user_id');
		    $table->string('city');
		    $table->string('state');
		    $table->string('address');
		    $table->string('sex');
		    $table->string('country');
		    $table->string('how_you_heard');
		    $table->string('date_of_birth');

		    $table->dropColumn('password');
		    $table->dropColumn('email');
		    $table->dropColumn('isActive');
		    $table->dropColumn('last_logged_in_at');
		    $table->dropColumn('remember_token');
		    $table->dropColumn('verified');
		    $table->dropColumn('email_verified_at');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('accountants', function (Blueprint $table) {
		    $table->dropColumn('user_id');
		    $table->dropColumn('city');
		    $table->dropColumn('state');
		    $table->dropColumn('address');
		    $table->dropColumn('sex');
		    $table->dropColumn('date_of_birth');
		    $table->dropColumn('country');
		    $table->dropColumn('how_you_heard');

		    $table->string('password');
		    $table->string('email');
		    $table->string('isActive');
		    $table->string('last_logged_in_at');
		    $table->string('remember_token');
		    $table->string('verified');
		    $table->string('email_verified_at');
	    });
    }
}
