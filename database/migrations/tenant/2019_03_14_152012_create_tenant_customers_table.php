<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->nullable()->default(false);
            $table->enum('type', ['company', 'person'])->nullable()->default('company');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('taxid', 13)->nullable();
            $table->string('name', 250);
            $table->string('address')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code', 5)->nullable();
            $table->string('country')->nullable()->default('thailand');
            $table->longText('description')->nullable();
            $table->string('contactname', 200)->nullable();
            $table->string('phoneno', 10)->nullable();
            $table->string('weburl')->nullable();
            $table->string('facebook')->nullable();
            $table->string('line')->nullable();
            $table->string('location_lat')->nullable();
            $table->string('location_lng')->nullable();
            $table->integer('businesstype_id')->unsigned()->nullable();
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
        Schema::dropIfExists('customers');
    }
}
