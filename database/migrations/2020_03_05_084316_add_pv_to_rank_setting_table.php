<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPvToRankSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rank_setting', function (Blueprint $table) {
             $table->string('personal_pv')->after('rank_bonus');
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
            $table->dropColumn('personal_pv');
        });
    }
}
