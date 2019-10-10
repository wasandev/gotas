<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyCharterPriceQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charter_price_quotation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('charter_price_id')->unsigned();
            $table->bigInteger('quotation_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('charter_price_quotation', function (Blueprint $table) {
            $table->unique([
                'charter_price_id',
                'quotation_id',
            ], 'PrimaryCharterPriceQuotation');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations')
                ->onDelete('cascade');
            $table->foreign('charter_price_id')
                ->references('id')
                ->on('charter_prices')
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
        Schema::dropIfExists('charter_price_quotation');
    }
}
