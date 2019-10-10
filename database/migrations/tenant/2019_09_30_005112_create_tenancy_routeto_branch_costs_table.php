<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyRoutetoBranchCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routeto_branch_costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('routeto_branch_id')->unsigned();
            $table->boolean('status')->nullable()->default(false);
            $table->integer('cartype_id')->unsigned();
            $table->integer('carstyle_id')->unsigned();
            $table->double('fuel_cost', 8, 2)->nullable()->default(0.00);
            $table->double('fuel_amount', 8, 2)->nullable()->default(0.00);
            $table->decimal('timespent', 5, 2)->nullable();

            $table->double('car_charge', 8, 2)->nullable()->default(0.00);
            $table->double('driver_charge', 8, 2)->nullable()->default(0.00);
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('routeto_branch_costs', function (Blueprint $table) {
            $table->unique([
                'routeto_branch_id',
                'cartype_id',
                'carstyle_id'
            ], 'PrimaryRoutetoBranchCosts');
            $table->foreign('routeto_branch_id')
                ->references('id')
                ->on('routeto_branch')
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
        Schema::dropIfExists('routeto_branch_costs');
    }
}
