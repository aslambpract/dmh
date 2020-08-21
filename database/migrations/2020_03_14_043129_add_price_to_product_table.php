<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToProductTable extends Migration
{
    /**
     * Runx the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->double('mrp_price')->after('quantity');
            $table->double('dp_price')->after('mrp_price');
            $table->double('sv')->after('dp_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
             $table->dropColumn('mrp_price');
             $table->dropColumn('dp_price');
             $table->dropColumn('sv');
        });
    }
}
