<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalSalesVolumeToRankSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rank_setting', function (Blueprint $table) {
             $table->integer('total_sales_volume')->after('life_insurance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rank_setting', function (Blueprint $table) {
             $table->dropColumn('total_sales_volume');
        });
    }
}
