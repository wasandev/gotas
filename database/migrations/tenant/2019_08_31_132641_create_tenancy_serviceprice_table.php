<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyServicepriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceprices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150)->unique();
            $table->boolean('status')->default(true);
            $table->enum('pricetypes', ['size', 'weight', 'sizeorweight'])->default('size');
            $table->decimal('startrate', 8, 2)->nullable()->default(0);
            $table->decimal('oversizerate', 8, 2)->nullable()->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
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
        Schema::dropIfExists('serviceprices');
    }
}
