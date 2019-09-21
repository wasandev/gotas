<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyProductservicePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productservice_price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->integer('from_branch_id')->unsigned();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->decimal('price', 10, 4)->default(0);
            $table->integer('unit_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('productservice_price', function (Blueprint $table) {
            $table->unique([
                'from_branch_id',
                'district',
                'province',
                'product_id',
                'unit_id',
            ], 'PrimaryProductServicePrice');
            $table->foreign('from_branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::dropIfExists('productservice_price');
    }
}
