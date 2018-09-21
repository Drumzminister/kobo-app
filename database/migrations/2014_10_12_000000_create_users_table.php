<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('attachment')->nullable();
            $table->boolean('status');
            $table->string('last_logged_in_at');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
        });

        //Create table for associating companies to users

        Schema::create('user_companies', function (Blueprint $table) {
            $table->string('user_id')->index();
            $table->string('company_id')->index();
            $table->string('user_type');

            $table->primary(['user_id', 'company_id', 'user_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_companies');
        Schema::dropIfExists('users');
    }
}
