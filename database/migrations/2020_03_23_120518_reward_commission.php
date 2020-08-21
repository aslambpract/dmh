<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RewardCommission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('reward_commission', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('from_id');
            $table->double('total_amount');
            $table->double('tds');
            $table->double('service_charge');
            $table->double('payable_amount');
            $table->string('payment_type', 255)->default('');
            $table->string('payment_status')->default('yes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * fReverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reward_commission');
    }
}
