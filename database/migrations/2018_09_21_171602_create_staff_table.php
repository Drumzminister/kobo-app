<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{

    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->string('id', 100);
            $table->string('name');
            $table->string('designation');
            $table->datetime('employed_date');
            $table->double('salary', 15, 4)->default('0.0000');
            $table->boolean('status')->default(1);
            $table->string('company_id')->index();
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
