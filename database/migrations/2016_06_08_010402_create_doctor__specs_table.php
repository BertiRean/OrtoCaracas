<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('doctor_specs');
        
        Schema::create('doctor_specs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('doctor_id')->unsigned();
            $table->integer('spec_id')->unsigned();

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
        Schema::dropIfExists('doctor_specs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
