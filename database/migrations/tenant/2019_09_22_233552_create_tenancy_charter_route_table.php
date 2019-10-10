<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyCharterRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charter_routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->boolean('status')->nullable()->default(false);
            $table->bigInteger('branch_area_id')->unsigned();
            $table->string('to_district', 100);
            $table->string('to_province', 100);
            $table->double('distance', 8, 2)->nullable()->default(0.00);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('charter_routes', function (Blueprint $table) {
            $table->unique([
                'branch_area_id',
                'to_district',
                'to_province'
            ], 'PrimaryCharterRoutes');

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
        Schema::dropIfExists('charter_routes');
    }
}
