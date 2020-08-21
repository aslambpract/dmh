<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCappingBinaryToRankSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rank_setting', function (Blueprint $table) {
            $table->double('daily_capping_binary')->after('monthly_repurchase');
            $table->double('reward_points')->after('daily_capping_binary');

            $table->double('monthly_salary');
            $table->double('franchise_bonus')->after('monthly_salary');
            $table->double('life_insurance')->after('franchise_bonus');
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
            $table->dropColumn('daily_capping_binary');
            $table->dropColumn('reward_points');

            $table->dropColumn('monthly_salary');
            $table->dropColumn('franchise_bonus');
            $table->dropColumn('life_insurance');
        });
    }
}
