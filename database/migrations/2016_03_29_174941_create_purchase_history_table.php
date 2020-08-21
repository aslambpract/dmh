<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_history', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('purchase_user_id')->unsigned();
            $table->foreign('purchase_user_id')->references('id')->on('users');
            $table->integer('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('packages');
            
            $table->double('pv', 15, 2)->default(0);
            $table->double('count', 15)->default(0);
            $table->double('total_amount', 15, 2)->default(0);
            $table->string('pay_by')->default(false);
            $table->string('sales_status')->default('yes');
            $table->double('rs_balance')->default(false);
             $table->string('purchase_type');
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
        Schema::drop('purchase_history');
    }
}


// Schema::table('services', function($table) { 
//     $table->bigInteger('business_id')->unsigned()->index(); 
//     $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade'); 
// });