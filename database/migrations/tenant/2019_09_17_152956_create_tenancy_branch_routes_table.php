<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyBranchRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned();
            $table->bigInteger('branch_area_id')->unsigned();
            $table->string('name', 150);
            $table->double('distance', 8, 2)->nullable()->default(0.00);
            $table->timestamps();
        });
        Schema::table('branch_routes', function (Blueprint $table) {
            $table->unique([
                'branch_id',
                'branch_area_id',
            ], 'PrimaryBrachRoute');
            $table->foreign('branch_id')
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
        Schema::dropIfExists('branch_routes');
    }
}
