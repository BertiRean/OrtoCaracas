<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('specialities');

        Schema::create('specialities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_speciality');
            $table->string('name', 128);
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
        Schema::dropIfExists('specialities');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
