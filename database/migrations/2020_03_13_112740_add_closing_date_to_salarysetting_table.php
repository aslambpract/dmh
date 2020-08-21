<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClosingDateToSalarysettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salarysetting', function (Blueprint $table) {
             $table->date('closing_date')->after('ratio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salarysetting', function (Blueprint $table) {
            $table->dropColumn('closing_date');
        });
    }
}
