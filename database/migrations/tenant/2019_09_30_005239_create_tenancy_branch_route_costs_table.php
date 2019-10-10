<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyBranchRouteCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_route_costs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('branch_route_id')->unsigned();
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
        Schema::table('branch_route_costs', function (Blueprint $table) {
            $table->unique([
                'branch_route_id',
                'cartype_id',
                'carstyle_id'
            ], 'PrimaryBranchRouteCosts');
            $table->foreign('branch_route_id')
                ->references('id')
                ->on('branch_routes')
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
        Schema::dropIfExists('branch_route_costs');
    }
}
