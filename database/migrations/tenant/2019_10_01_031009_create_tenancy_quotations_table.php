<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(false);
            $table->string('status', 100)->nullable()->default('open');
            $table->char('quotation_no', 20);
            $table->dateTime('quotation_date');
            $table->integer('branch_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->enum('paymenttype', ['เงินสด', 'วางบิล'])->default('เงินสด');
            $table->dateTime('expiration_date')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('terms', 150)->nullable();
            $table->timestamps();
        });
        Schema::table('quotations', function (Blueprint $table) {
            $table->unique([
                'quotation_no',
            ], 'PrimaryQuotaions');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
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
        Schema::dropIfExists('quotations');
    }
}
