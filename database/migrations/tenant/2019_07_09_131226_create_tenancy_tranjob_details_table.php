<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyTranjobDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranjob_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tranjob_id');
            $table->integer('product_id')->unsigned();
            $table->double('amount', 12, 2)->default(1.00);
            $table->integer('unit_id')->unsigned();
            $table->double('tranprice', 12, 2)->default(1.00);
            $table->double('productprice', 12, 2)->default(1.00);
            $table->string('remark', 200)->nullable();
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
        Schema::dropIfExists('tranjob_details');
    }
}
