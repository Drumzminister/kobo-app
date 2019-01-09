<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{

    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('role');
            $table->date('employed_date');
            $table->double('salary')->default('0.0000');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->text('comment')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('isActive')->default(1);
            $table->string('company_id', 36);
            $table->string('user_id', 36);
            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
