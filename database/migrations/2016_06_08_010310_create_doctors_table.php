<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('doctors');

        Schema::create('doctors', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id_doctor');
            $table->string('name', 128)->default("");
            $table->integer('ci')->unsigned();
            $table->bigInteger('bank_account');
            $table->integer('contact_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('doctors');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
