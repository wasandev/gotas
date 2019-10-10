<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToServicepriceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('serviceprice_items', function (Blueprint $table) {
            $table->foreign('parcel_id')
                ->references('id')
                ->on('parcels')
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
        Schema::table('serviceprice_items', function (Blueprint $table) {
            $table->dropForeign('serviceprice_items_parcel_id_foreign');
        });
    }
}
