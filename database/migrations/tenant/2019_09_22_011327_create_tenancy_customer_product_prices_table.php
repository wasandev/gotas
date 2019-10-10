<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyCustomerProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_product_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->nullable()->default(false);
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('from_branch_id')->unsigned();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->decimal('price', 10, 4)->default(0);
            $table->integer('unit_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('customer_product_prices', function (Blueprint $table) {
            $table->unique([
                'customer_id',
                'product_id',
                'from_branch_id',
                'district',
                'province',
                'unit_id',
            ], 'PrimaryProductCustomerPrice');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
            $table->foreign('from_branch_id')
                ->references('id')
                ->on('branches')
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
        Schema::dropIfExists('customer_product_prices');
    }
}
