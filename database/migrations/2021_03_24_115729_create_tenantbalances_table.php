<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantbalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenantbalances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('property_id');
            $table->string('tcode');
            $table->string('telno');
            $table->text('location');
            $table->string('payable');
            $table->float('amount');
            $table->string('fieldofficer');
            $table->float('balance');
            $table->softDeletes();
            $table->string('month');
            $table->string('year');
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
        Schema::dropIfExists('tenantbalances');
    }
}
