<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNextPurchaseDatePurchaseHistoryTable extends Migration
{
    /**
     * Rxun the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_history', function (Blueprint $table) {
              $table->datetime('next_purchase_date')->after('purchase_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_history', function (Blueprint $table) {
            $table->dropColumn('next_purchase_date');
        });
    }
}
