<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewBonusToRankSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rank_setting', function (Blueprint $table) {
            $table->double('consultant_bonus')->after('personal_pv');
            $table->double('sales_development_bonus')->after('consultant_bonus');
            $table->double('monthly_repurchase')->after('sales_development_bonus');
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
            $table->dropColumn('consultant_bonus');
            $table->dropColumn('sales_development_bonus');
            $table->dropColumn('monthly_repurchase');
        });
    }
}
