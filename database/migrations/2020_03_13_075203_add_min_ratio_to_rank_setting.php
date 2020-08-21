<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMinRatioToRankSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rank_setting', function (Blueprint $table) {
            $table->integer('min_ratio')->after('reward_points');
        });
    }

    /**
     * Reverse x migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rank_setting', function (Blueprint $table) {
            $table->dropColumn('min_ratio');
        });
    }
}
