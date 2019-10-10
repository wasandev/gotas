<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->decimal('width', 10, 4)->default(0.00);
            $table->decimal('length', 10, 4)->default(0.00);
            $table->decimal('height', 10, 4)->default(0.00);
            $table->decimal('weight', 10, 4)->default(0.00);
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('parcels', function (Blueprint $table) {
            $table->unique([
                'name',
                'width',
                'length',
                'height',
                'weight',
            ], 'PrimaryParcels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcels');
    }
}
