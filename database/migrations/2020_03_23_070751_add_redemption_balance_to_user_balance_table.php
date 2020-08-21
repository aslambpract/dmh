<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRedemptionBalanceToUserBalanceTable extends Migration
{
    /**
     * Run thxe migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_balance', function (Blueprint $table) {
            $table->double('redemption_balance')->after('balance');
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
             // $table->dropColumn('redemption_balance');
        });
    }
}
