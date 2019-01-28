<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('company_id');
            $table->string('staff_id');
            $table->decimal('amount', 15, 2);
            $table->date('start');
            $table->date('end');
            $table->text('property_details');
            $table->boolean('has_completed_payment')->default(false);
            $table->text('other_costs')->nullable();
            $table->boolean('expired')->default(false);
            $table->date('prev_rent_period_end')->nullable();
            $table->date('next_rent_period_start')->nullable();
            $table->integer('periods_passed')->default(0);
            $table->boolean('is_active')->default(true);
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
