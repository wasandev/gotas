<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyThaiAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('district', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('province_id')->unsigned();
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('province')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('sub_district', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('district_id')->unsigned();
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('district')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('postal_code', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->integer('sub_district_id')->unsigned();
            $table->integer('district_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->timestamps();

            $table->foreign('sub_district_id')->references('id')->on('sub_district')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('district')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('province')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('postal_code');
        Schema::dropIfExists('sub_district');
        Schema::dropIfExists('district');
        Schema::dropIfExists('province');
    }
}
