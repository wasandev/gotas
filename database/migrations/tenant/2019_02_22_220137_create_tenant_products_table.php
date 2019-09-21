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
            $table->boolean('status')->nullable()->default(true);
            $table->integer('category_id')->unsigned();
            $table->integer('product_style_id')->nullable();
            $table->string('name', 255)->unique();
            $table->decimal('width', 10, 4)->default(0.00);
            $table->decimal('length', 10, 4)->default(0.00);
            $table->decimal('height', 10, 4)->default(0.00);
            $table->decimal('weight', 10, 4)->default(0.00);
            $table->integer('unit_id')->unsigned();
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
