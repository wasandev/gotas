<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenancyTranjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranjobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('trantype', ['charter', 'piece'])->default('piece');
            $table->integer('branchsend_id')->unsigned();
            $table->integer('branchrec_id')->unsigned();
            $table->char('tranjob_no', 20);
            $table->char('tracking_no', 20);
            $table->integer('sender_id')->unsigned();
            $table->enum('sendoptions', ['ไปรับ', 'นำมาส่ง'])->default('นำมาส่ง');
            $table->integer('loadaddress_id')->unsigned()->nullable();
            $table->integer('reciever_id')->unsigned();
            $table->integer('deliveryaddress_id')->unsigned()->nullable();
            $table->enum('recieveoptions', ['รับเอง', 'จัดส่ง'])->default('จัดส่ง');
            $table->enum('paymenttype', ['cash-s', 'cash-r', 'cr-s', 'cr-r'])->default('cash-s');
            $table->date('tranjob_date');
            $table->integer('user_id')->unsigned();
            $table->integer('employee_id')->unsigned();
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
        Schema::dropIfExists('tranjobs');
    }
}
