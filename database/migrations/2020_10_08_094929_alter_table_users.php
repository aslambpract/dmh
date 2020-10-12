<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('users', function (Blueprint $table) {

              $table->string('id_number')->after('remember_token')->nullable()->default(null);
              $table->string('account_number')->after('id_number')->nullable()->default(null);
              $table->string('branch')->after('account_number')->nullable()->default(null);
              $table->string('next_of_kin')->after('branch')->nullable()->default(null);
              $table->string('info')->after('next_of_kin')->nullable()->default(null);
              $table->string('date_of_birth')->after('info')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
              $table->string('id_number');
              $table->string('account_number');
              $table->string('branch');
              $table->string('next_of_kin');
              $table->string('info');
              $table->string('date_of_birth');

        });
    }
}
