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
            $table->string('ci', 16)->unique()->default("");
            $table->string('bank_account', 20)->default("");
            $table->integer('contact_id')->unsigned();
            $table->boolean('status');
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
