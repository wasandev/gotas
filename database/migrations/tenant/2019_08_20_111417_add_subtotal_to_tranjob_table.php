<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubtotalToTranjobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tranjobs', function (Blueprint $table) {
            $table->date('senddate')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->double('sub_total')->default(0);
            $table->double('discount')->default(0);
            $table->double('total')->default(0);
            $table->string('reference', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tranjobs', function (Blueprint $table) {
            $table->dropColumn('senddate');
            $table->dropcolumn('terms_and_conditions');
            $table->dropcolumn('sub_total');
            $table->dropcolumn('discount');
            $table->dropcolumn('total');
            $table->dropcolumn('reference');
        });
    }
}
