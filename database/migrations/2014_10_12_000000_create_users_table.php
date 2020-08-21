<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('lastname')->default(false);
            $table->string('username')->unique(); // used for slug.
            // $table->string('user_id')->unique(); // used for slug.
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->string('transaction_pass', 60)->nullable();
            $table->integer('rank_id');
            $table->integer('monthly_maintenance')->default(1);
            $table->date('rank_update_date');
            $table->string('register_by')->default(false);
            $table->string('confirmation_code')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->boolean('admin')->default(false);
            $table->integer('black_list');
            $table->string('shipping_state');
            $table->string('active')->default('yes');
            $table->string('hypperwallet_token')->default(false)->nullable();
            $table->string('hypperwalletid')->default(false)->nullable();
            $table->string('enable_2fa')->default(0);
            $table->string('shipping_country');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
