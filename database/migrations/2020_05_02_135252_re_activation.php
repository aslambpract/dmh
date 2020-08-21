<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReActivation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('reactivation', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');          
            $table->integer('account_id');
            $table->string('status')->default("pending");                    
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
        Schema::drop('reactivation');
    }
}
