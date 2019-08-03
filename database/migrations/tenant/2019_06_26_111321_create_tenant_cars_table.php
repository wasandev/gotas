<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('car_regist', 10);
            $table->string('car_province', 100);
            $table->enum('ownertype', ['owner', 'partner'])->default('owner');
            $table->integer('vendor_id')->unsigned()->nullable();
            $table->string('engineno', 100)->nullable();
            $table->string('carno', 100)->nullable();
            $table->integer('cartype_id')->unsigned();
            $table->enum('carposition', ['tractor', 'trailer'])->nullable();
            $table->integer('carstyle_id')->unsigned()->nullable();
            $table->string('carbrand', 100)->nullable();
            $table->string('carmodel', 100)->nullable();
            $table->date('purchase_date')->nullable();
            $table->double('purchase_price', 10, 2)->nullable()->default(0.00);
            $table->date('registration_date')->nullable();
            $table->integer('tiretype_id')->unsigned()->nullable();
            $table->smallInteger('tires')->nullable()->default(10);
            $table->string('car_cc', 100)->nullable();
            $table->double('car_volumn', 10, 2)->nullable()->default(0.00);
            $table->double('car_weight', 5, 2)->nullable()->default(0.00);
            $table->double('load_weight', 5, 2)->nullable()->default(123.45);
            $table->enum('fueltype', ['diesel', 'gasoline', 'LPG', 'NGV'])->nullable()->default('diesel');
            $table->integer('saler_id')->unsigned()->nullable();
            $table->integer('insurance1_id')->unsigned()->nullable();
            $table->string('insurance1_no', 100)->nullable();
            $table->date('insurance1_enddate')->nullable();
            $table->integer('insurance2_id')->unsigned()->nullable();
            $table->string('insurance2_no', 100)->nullable();
            $table->date('insurance2_enddate')->nullable();
            $table->integer('finance_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
