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
            $table->bigInteger('parcel_id')->unsigned();
            $table->integer('from_branch_id')->unsigned();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->decimal('price', 10, 4)->default(0.00);
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('serviceprice_items', function (Blueprint $table) {
            $table->unique([
                'parcel_id',
                'from_branch_id',
                'district',
                'province',
                'price',
            ], 'PrimaryServicepriceItem');
            $table->foreign('from_branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade');
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
