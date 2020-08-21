<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwardsettingTable extends Migration
{
    /**
     * Run thej migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riward_setting', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('rank', 500);
            $table->double('percentage');
            $table->double('mini_monthly_income');
            $table->double('points');
            $table->string('allow_after_six_months');            
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
        Schema::dropIfExists('riward_setting');
    }
}
