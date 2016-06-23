<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('dates');
        
        Schema::create('dates', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('date_id');
            $table->integer('doctor_id')->unsigned();
            $table->integer('pacient_id')->unsigned();
            $table->timestamp('date_consult');
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
        Schema::dropIfExists('dates');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
