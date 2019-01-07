<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{

    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->string('id', 36);
	        $table->string('company_id', 36);
	        $table->string('user_id', 36);
	        $table->string('name');
	        $table->string('designation');
	        $table->date('employed_date');
	        $table->double('salary')->default('0.0000');
	        $table->boolean('isActive')->default(1);
            $table->string('avatar');
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
