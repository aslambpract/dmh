<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('point_value');
            $table->integer('pair_value');
            $table->integer('pair_amount');
            $table->integer('tds');
            $table->integer('service_charge');
            $table->integer('sponsor_Commisions');
            $table->integer('payout_notification');
            $table->integer('joinfee');
            $table->integer('voucher_daily_limit');
            $table->longtext('content');
            $table->longtext('cookie');
            $table->string('wallet_id');
            $table->string('wallet_id_hash',510);
            $table->string('wallet_address'); 
            $table->string('uploadusers')->default('uploadusers.xlsx');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
