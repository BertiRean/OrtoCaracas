<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('expenses', function (Blueprint $table)
        {
            $table->increments('id_expense');
            $table->string('description');
            $table->string('bill_number', 128);
            $table->float('amount');
            $table->timestamp('date');
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
        Schema::dropIfExists('expenses');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
