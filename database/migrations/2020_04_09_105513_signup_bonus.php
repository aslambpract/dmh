<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SignupBonus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('signup_bonus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('period');
            $table->string('type');
            $table->double('pair_value')->default('100')->nullable();
            $table->text('pair_commission')->nullable();
            $table->text('pair_commission_percent')->nullable();
            $table->string('binary_cap')->default('no')->nullable();
            $table->double('ceiling')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('signup_bonus') ;
    }
}
