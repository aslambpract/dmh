<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToEwalletSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ewallet_settings', function (Blueprint $table) {
            $table->string('type')->after('bitcoin_address');
            $table->double('balance',15,8)->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ewallet_settings', function (Blueprint $table) {
            //
        });
    }
}
