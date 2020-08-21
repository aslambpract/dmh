<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarysettingTable extends Migration
{
    /**
     * Run the mibgrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarysetting', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('post_name', 500);
            $table->integer('monthly_repurchase');
            $table->integer('calculation_periods');
            $table->double('sales_volume');
            $table->double('ratio');
            $table->string('payment',500);
            $table->string('carry_forward_volume', 500);
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
        Schema::dropIfExists('salarysetting');
    }
}
