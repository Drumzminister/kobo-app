<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->string('id');
	        $table->string('user_id')->index();
	        $table->string('name');
	        $table->string('slug')->nullable()->unique();
	        $table->string('ID_number')->unique();
	        $table->boolean('isActive')->default(1);
	        $table->string('logo')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
