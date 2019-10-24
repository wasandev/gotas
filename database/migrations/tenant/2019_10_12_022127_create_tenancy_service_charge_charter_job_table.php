<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyServiceChargeCharterJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_charge_charter_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_charge_id')->unsigned();
            $table->bigInteger('charter_job_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('service_charge_charter_job', function (Blueprint $table) {
            $table->unique([
                'charter_job_id',
                'service_charge_id'
            ], 'PrimaryServiceChargeCharterJob');
            $table->foreign('charter_job_id')
                ->references('id')
                ->on('charter_jobs')
                ->onDelete('cascade');
            $table->foreign('service_charge_id')
                ->references('id')
                ->on('service_charges')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_charge_charter_job');
    }
}
