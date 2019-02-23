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
//	    	$table->dropTimestamps();
		    $table->string('user_id')->after('id');
		    $table->string('city');
		    $table->string('state');
		    $table->string('address');
		    $table->string('picture')->nullable();
		    $table->string('sex');
		    $table->decimal('years_of_experience', 8, 2);
		    $table->string('level');
		    $table->string('country');
		    $table->string('how_you_heard');
		    $table->string('date_of_birth');
		    $table->timestamps();

		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

		    $table->dropColumn('password');
		    $table->dropColumn('email');
		    $table->dropColumn('isActive');
		    $table->dropColumn('last_logged_in_at');
		    $table->dropColumn('remember_token');
		    $table->dropColumn('verified');
		    $table->dropColumn('email_verified_at');
		    $table->dropColumn('client_id');
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
		    $table->dropForeign('accountants_user_id_foreign');
		    $table->dropColumn('user_id');
		    $table->dropColumn('city');
		    $table->dropColumn('state');
		    $table->dropColumn('address');
		    $table->dropColumn('sex');
		    $table->dropColumn('date_of_birth');
		    $table->dropColumn('country');
		    $table->dropColumn('how_you_heard');
		    $table->dropTimestamps();

		    $table->string('password');
		    $table->string('email');
		    $table->string('isActive');
		    $table->string('last_logged_in_at');
		    $table->string('remember_token');
		    $table->string('verified');
		    $table->string('email_verified_at');
		    $table->string('column_id');
	    });
    }
}
