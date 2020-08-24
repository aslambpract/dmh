<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreeTable6nd18 extends Migration
{
    /**
     * Run the migrations.
     *   
     * @return void
     */
     public function up()
    {
        Schema::create('tree_table7', function (Blueprint $table) {
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

         Schema::create('tree_table8', function (Blueprint $table) {
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

         Schema::create('tree_table9', function (Blueprint $table) {
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

         Schema::create('tree_table10', function (Blueprint $table) {
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

         Schema::create('tree_table11', function (Blueprint $table) {
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

         Schema::create('tree_table12', function (Blueprint $table) {
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

         Schema::create('tree_table13', function (Blueprint $table) {
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

         Schema::create('tree_table14', function (Blueprint $table) {
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

        Schema::create('tree_table15', function (Blueprint $table) {
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

        Schema::create('tree_table16', function (Blueprint $table) {
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

        Schema::create('tree_table17', function (Blueprint $table) {
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

        Schema::create('tree_table18', function (Blueprint $table) {
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
        Schema::dropIfExists('tree_table7');
        Schema::dropIfExists('tree_table8');
        Schema::dropIfExists('tree_table9');
        Schema::dropIfExists('tree_table10');
        Schema::dropIfExists('tree_table11');
        Schema::dropIfExists('tree_table12');
        Schema::dropIfExists('tree_table13');
        Schema::dropIfExists('tree_table14');
        Schema::dropIfExists('tree_table15');
        Schema::dropIfExists('tree_table16');
        Schema::dropIfExists('tree_table17');
        Schema::dropIfExists('tree_table18');

    }
}
