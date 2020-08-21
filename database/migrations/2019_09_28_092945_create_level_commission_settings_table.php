<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelCommissionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_commission_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('criteria');
            $table->double('nlevel_1')->nullable();
             $table->double('nlevel_2')->nullable();
              $table->double('nlevel_3')->nullable();
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
        Schema::dropIfExists('level_commission_settings');
    }
}
