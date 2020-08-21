<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountIdToCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commission', function (Blueprint $table) {
            $table->integer('account_id')->after('user_id');
        });
    }

    /**
     *  Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commission', function (Blueprint $table) {
            //
        });
    }
}
