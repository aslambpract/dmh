<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package');
            $table->double('commission_level1')->nullable();
            $table->double('commission_level2')->nullable();
            $table->double('commission_level3')->nullable();
              $table->double('matching_level1')->nullable();
            $table->double('matching_level2')->nullable();
            $table->double('matching_level3')->nullable();
            $table->double('sponsor_comm')->nullable();
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
        Schema::dropIfExists('level_settings');
    }
}
