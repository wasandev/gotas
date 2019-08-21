<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->string('name', 255);
            $table->integer('product_style_id')->nullable();
            $table->double('weight', 5, 2)->nullable()->default(0.00);
            $table->double('height', 5, 2)->nullable()->default(0.00);
            $table->double('length', 5, 2)->nullable()->default(0.00);
            $table->boolean('status')->nullable()->default(false);
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
        Schema::dropIfExists('products');
    }
}
