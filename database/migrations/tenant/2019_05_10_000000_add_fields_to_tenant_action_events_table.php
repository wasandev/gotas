<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTenantActionEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('action_events', function (Blueprint $table) {
            $table->json('original')->nullable();
            $table->json('changes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_events', function (Blueprint $table) {
            $table->dropColumn('original', 'changes');
        });
    }
}
