<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PendingCommission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pending_commission', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
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
        Schema::drop('pending_commission') ;
    }
}
