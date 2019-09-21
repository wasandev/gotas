<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToBranchRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branch_routes', function (Blueprint $table) {
            $table->foreign('branch_area_id')
                ->references('id')
                ->on('branch_areas')
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
        Schema::table('branch_routes', function (Blueprint $table) {

            $table->dropForeign('branch_routes_branch_area_id_foreign');
        });
    }
}
