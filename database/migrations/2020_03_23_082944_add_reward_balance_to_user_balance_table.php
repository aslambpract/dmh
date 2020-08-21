<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRewardBalanceToUserBalanceTable extends Migration
{
    /**
     * Runx the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_balance', function (Blueprint $table) {
             $table->double('reward_balance')->after('salary_balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_balance', function (Blueprint $table) {
            $table->dropColumn('reward_balance');
        });
    }
}
