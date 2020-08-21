<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingaddress', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id');
             $table->string('payment');
             $table->string('tracking_id');
             $table->integer('order_id');
             $table->integer('option_type');
             $table->string('fname');
             $table->string('lname');
             $table->string('email');
             $table->string('state');
             $table->string('country');
             $table->string('contact');
             $table->string('ninumber');
             $table->string('ic_number');
             $table->string('city');
             $table->text('address');
             $table->string('pincode');
             $table->string('status');
             $table->string('shipping_company')->default('NA');
             $table->string('admin_feed_back')->default('NA');
             $table->string('my_feed_back')->default('NA');
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
        Schema::dropIfExists('shoppingaddress');
    }
}
