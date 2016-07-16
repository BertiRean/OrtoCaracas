<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('exams', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_exam');
            $table->string('description', 256);
            $table->integer('pacient_id')->unsigned();
            $table->timestamp('date_exam');
            $table->string('personal', 64);
            $table->float('amount');
            $table->integer('department_id')->unsigned();
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
        Schema::dropIfExists('exams');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
