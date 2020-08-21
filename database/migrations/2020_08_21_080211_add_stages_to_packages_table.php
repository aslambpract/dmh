<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStagesToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
             $table->integer('stage')->after('payout');
             $table->double('fee')->after('stage');
             $table->double('upgrade_fee')->after('fee');
             $table->double('charge')->after('upgrade_fee');
             $table->double('member_benefit')->after('charge');
             $table->double('downline_bonus')->after('member_benefit');
             $table->double('insurace_completing_fee')->after('downline_bonus');
             $table->double('longrich_reg_fee')->after('insurace_completing_fee');
              $table->double('insurance_reg_fee')->after('longrich_reg_fee');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
