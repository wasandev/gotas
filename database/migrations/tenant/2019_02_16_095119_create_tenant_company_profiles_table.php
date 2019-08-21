<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 60);
            $table->string('taxid', 13)->nullable();
            $table->string('address')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code', 5)->nullable();
            $table->string('country')->nullable()->default('thailand');
            $table->longText('description')->nullable();
            $table->string('imagefile')->default('store.png');
            $table->string('logofile')->default('storelogo.png');
            $table->string('phoneno', 30)->nullable();
            $table->string('weburl')->nullable();
            $table->string('facebook')->nullable();
            $table->string('line')->nullable();
            $table->string('email', 200)->nullable();
            $table->string('location_lat')->nullable();
            $table->string('location_lng')->nullable();
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
        Schema::dropIfExists('company_profiles');
    }
}
