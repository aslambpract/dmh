<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreeTable4nd5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_table4', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('sponsor');
            $table->integer('placement_id');
            $table->integer('cyclecount')->default(1);
            $table->string('leg');
            $table->string('type')->default('vaccant');
            $table->timestamps();
        });

         Schema::create('tree_table5', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('sponsor');
            $table->integer('placement_id');
            $table->integer('cyclecount')->default(1);
            $table->string('leg');
            $table->string('type')->default('vaccant');
            $table->timestamps();
        });

         Schema::create('tree_table6', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('sponsor');
            $table->integer('placement_id');
            $table->integer('cyclecount')->default(1);
            $table->string('leg');
            $table->string('type')->default('vaccant');
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
        Schema::dropIfExists('tree_table4');
        Schema::dropIfExists('tree_table5');
        Schema::dropIfExists('tree_table6');
    }
}
