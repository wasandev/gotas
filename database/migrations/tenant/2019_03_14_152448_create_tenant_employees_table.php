<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['ประจำ', 'ทดลองงาน', 'สัญญาจ้าง', 'ชั่วคราว', 'รายวัน', 'ปลด/ไล่ออก', 'ลาออก', 'เลิกจ้าง', 'นักศึกษาฝึกงาน'])->nullable()->default('ประจำ');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->string('name', 250);
            $table->string('nickname', 20)->nullable();
            $table->integer('position_id')->nullable();
            $table->string('taxid', 13)->nullable();
            $table->string('address')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code', 5)->nullable();
            $table->string('country')->nullable()->default('thailand');
            $table->longText('description')->nullable();
            $table->string('imagefile')->default('store.png');
            $table->string('phoneno', 10)->nullable();
            $table->string('facebook')->nullable();
            $table->string('line')->nullable();
            $table->string('location_lat')->nullable();
            $table->string('location_lng')->nullable();
            $table->enum('type', ['พนักงานออฟฟิศ', 'แรงงาน', 'พนักงานขับรถ', 'ผู้บริหาร'])->nullable()->default('พนักงานออฟฟิศ');
            $table->integer('driving_license_type_id')->unsigned()->nullable();
            $table->string('driving_license_no', 20)->nullable();
            $table->date('driving_license_date')->nullable();
            $table->date('driving_license_enddate')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
