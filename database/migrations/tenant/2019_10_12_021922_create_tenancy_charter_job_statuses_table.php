<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyCharterJobStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charter_job_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('charter_job_id')->unsigned();
            $table->string('status', 100)->nullable()->default('open');
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('charter_job_statuses', function (Blueprint $table) {
            $table->unique([
                'charter_job_id',
                'status'
            ], 'PrimaryCharterJobStatuses');
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
        Schema::dropIfExists('charter_job_statuses');
    }
}
