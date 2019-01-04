<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountant_reviews', function (Blueprint $table) {
            $table->string('id');
            $table->string('accountant_id');
            $table->string('client_id');
            $table->string('subject')->nullable();
            $table->text('other_notes')->nullable();
	        $table->unsignedInteger('rating')->nullable();
	        $table->text('comment')->nullable();
            $table->timestamps();
	        $table->softDeletes();

	        $table->primary('id');
        });

	    Schema::create('company_reviews', function (Blueprint $table) {
		    $table->string('id');
		    $table->string('company_id');
		    $table->string('subject')->nullable();
		    $table->text('last_review')->nullable();
		    $table->text('review');
		    $table->timestamps();
		    $table->softDeletes();

		    $table->primary('id');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountant_reviews');
        Schema::dropIfExists('company_reviews');
    }
}
