<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('consults');
        
        Schema::create('consults', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('doctor_id')->unsigned();
            $table->integer('pacient_id')->unsigned();
            
            $table->string('description', 256);
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
        Schema::dropIfExists('consults');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
