<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyCharterJobInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charter_job_insurances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('charter_job_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned();
            $table->string('insurance_no', 100)->nullable();
            $table->double('insurance_fee', 8, 2)->nullable()->default(0);
            $table->double('insurance_cost', 8, 2)->nullable()->default(0);
            $table->timestamps();
        });
        Schema::table('charter_job_insurances', function (Blueprint $table) {

            $table->foreign('charter_job_id')
                ->references('id')
                ->on('charter_jobs')
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
        Schema::dropIfExists('charter_job_insurances');
    }
}
