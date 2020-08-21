<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SignupBonusSetting extends Migration
{
    /**
     * Run the gmigrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup_bonus_setting', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('rank');
            $table->double('qualify_personal_sv');  
            $table->double('income'); 
            $table->string('capping');    
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
        Schema::dropIfExists('signup_bonus_setting');
    }
}
