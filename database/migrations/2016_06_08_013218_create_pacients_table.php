<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pacients');

        Schema::create('pacients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_pacient');
            $table->string('name', 128);
            $table->integer('ci')->unique();
            $table->date('birth_date');
            $table->char('sex', 1);
            $table->boolean('status');
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
        Schema::dropIfExists('pacients');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
