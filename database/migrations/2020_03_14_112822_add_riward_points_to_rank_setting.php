<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRiwardPointsToRankSetting extends Migration
{
    /**
     * Run the mdigrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rank_setting', function (Blueprint $table) {
            $table->string('riward_points')->after('min_ratio');
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
            $table->dropColumn('riward_points');
        });
    }
}
