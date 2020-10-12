<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdNumberToPendingTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pending_transactions', function (Blueprint $table) {

              $table->string('id_number')->nullable()->default(null);
              $table->string('account_number')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pending_transactions', function (Blueprint $table) {
               $table->dropColumn('id_number');
               $table->dropColumn('account_number');
        });
    }
}
