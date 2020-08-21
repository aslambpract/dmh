<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalaryBalanceToUserBalanceTable extends Migration
{
    /**
     * Run athe migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_balance', function (Blueprint $table) {
            $table->double('salary_balance')->after('redemption_balance');
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
            $table->dropColumn('salary_balance');
        });
    }
}
