<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantunits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id');
            $table->string('unit');
            $table->string('category');
            $table->text('location');
            $table->float('rent_amount');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('properties');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacantunits');
    }
}
