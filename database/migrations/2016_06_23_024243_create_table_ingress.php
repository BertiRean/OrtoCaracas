<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIngress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('earnings', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_earning');
            $table->float('mount')->default(0);
            $table->date('date');
            $table->tinyInteger('department_id')->unsigned()->default(0);
            $table->tinyInteger('doctor_id')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('earnings');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
