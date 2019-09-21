<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyServicepriceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceprice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('serviceprice_id')->unsigned();
            $table->string('name', 150);
            $table->decimal('width', 10, 4)->default(0.00);
            $table->decimal('length', 10, 4)->default(0.00);
            $table->decimal('height', 10, 4)->default(0.00);
            $table->decimal('weight', 10, 4)->default(0.00);
            $table->integer('from_branch_id')->unsigned();
            $table->integer('to_branch_id')->unsigned();
            $table->decimal('price', 10, 4)->default(0.00);
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('serviceprice_items', function (Blueprint $table) {
            $table->unique([
                'name',
                'width',
                'length',
                'height',
                'weight',
                'from_branch_id',
                'to_branch_id',
            ], 'PrimaryServicepriceItem');
            $table->foreign('serviceprice_id')
                ->references('id')
                ->on('serviceprices')
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
        Schema::dropIfExists('serviceprice_items');
    }
}
