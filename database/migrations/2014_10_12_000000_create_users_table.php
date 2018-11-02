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
            $table->string('id')->primary()->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('attachment')->nullable();
            $table->boolean('verified')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('isActive')->default(1);
            $table->string('last_logged_in_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        //Create table for associating companies to users

        Schema::create('user_companies', function (Blueprint $table) {
            $table->string('user_id')->index()->primary();
            $table->string('company_id')->index();
            $table->string('user_role')->index();

            // $table->primary(['user_id', 'company_id', 'user_role']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_companies');
    }
}
