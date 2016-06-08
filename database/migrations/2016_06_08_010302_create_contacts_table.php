<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('contacts');
        
        Schema::create('contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_contact');
            $table->string('email', 64);
            $table->bigInteger('phone_1');
            $table->bigInteger('phone_2');
            $table->string('address', 256);
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
        Schema::dropIfExists('contacts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
