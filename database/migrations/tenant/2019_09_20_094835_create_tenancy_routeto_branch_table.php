<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyRoutetoBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routeto_branch', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('branch_id')->unsigned();
            $table->integer('dest_branch_id')->unsigned();
            $table->string('name', 150)->nullable();
            $table->double('distance', 8, 2)->nullable()->default(0.00);
            $table->timestamps();
        });
        Schema::table('routeto_branch', function (Blueprint $table) {
            $table->unique([
                'branch_id',
                'dest_branch_id',
            ], 'PrimaryRoutetoBrach');
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade');

            $table->foreign('dest_branch_id')
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
        Schema::dropIfExists('routeto_branch_routes');
    }
}
