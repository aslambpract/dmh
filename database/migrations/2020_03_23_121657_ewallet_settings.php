<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class EwalletSettings extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('ewallet_settings', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('bitcoin_address');

            // $table->double('percentage');

            // $table->string('development');

            // $table->string('consultant');

            // $table->string('signup');

            // $table->string('rank');

           

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

        Schema::drop('ewallet_settings');

    }

}

