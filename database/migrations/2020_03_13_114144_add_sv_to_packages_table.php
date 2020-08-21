<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSvToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidx
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->double('special_wallet')->after('capping');
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
            $table->dropColumn('special_wallet');
        });
    }
}
