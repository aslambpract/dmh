<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayoutRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payout_request', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('account_id');
            $table->string('account_type', 255)->default('account');
            $table->double('amount');
            $table->integer('payment_mode');
            $table->string('status', 255)->default('');
            $table->string('tx_hash')->default('')->nullable();

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
        Schema::drop('payout_request');
    }
}
