<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyCharterPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charter_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->nullable()->default(false);
            $table->bigInteger('charter_route_id')->unsigned();
            $table->integer('cartype_id')->unsigned();
            $table->integer('carstyle_id')->unsigned();
            $table->double('price', 8, 2)->nullable()->default(0.00);
            $table->integer('pickuppoint')->nullable()->default(2);
            $table->double('overpointcharge', 8, 2)->nullable()->default(0);
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('charter_prices', function (Blueprint $table) {
            $table->unique([
                'charter_route_id',
                'cartype_id',
                'carstyle_id'
            ], 'PrimaryCharterPrices');
            $table->foreign('charter_route_id')
                ->references('id')
                ->on('charter_routes')
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
        Schema::dropIfExists('charter_prices');
    }
}
