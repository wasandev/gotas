<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyBranchRouteDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_route_districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('branch_route_id')->unsigned();
            $table->bigInteger('branch_area_id')->unsigned();
            $table->double('distance', 8, 2)->nullable()->default(0.00);
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('branch_route_districts', function (Blueprint $table) {
            $table->unique([
                'branch_route_id',
                'branch_area_id',
            ], 'PrimaryBrachRouteDistrict');
            $table->foreign('branch_route_id')
                ->references('id')
                ->on('branch_routes')
                ->onDelete('cascade');
            $table->foreign('branch_area_id')
                ->references('id')
                ->on('branch_areas')
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
        Schema::dropIfExists('branch_route_districts');
    }
}
