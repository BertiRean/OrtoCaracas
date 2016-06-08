<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function(Blueprint $table){

            $table->foreign('contact_id')->references('id_contact')->on('contacts');
        });

        Schema::table('pacients', function(Blueprint $table)
        {
            $table->foreign('contact_id')->references('id_contact')->on('contacts');
        });

        Schema::table('doctor_specs', function(Blueprint $table)
        {
            $table->foreign('doctor_id')->references('id_doctor')->on('doctors');
            $table->foreign('spec_id')->references('id_speciality')->on('specialities');
        });

        Schema::table('consults', function(Blueprint $table)
        {
            $table->foreign('doctor_id')->references('id_doctor')->on('doctors');
            $table->foreign('pacient_id')->references('id_pacient')->on('pacients');
        });

        Schema::table('dates', function(Blueprint $table)
        {
            $table->foreign('doctor_id')->references('id_doctor')->on('doctors');
            $table->foreign('pacient_id')->references('id_pacient')->on('pacients');
        });

        Schema::table('phones', function(Blueprint $table)
        {
            $table->foreign('contact_id')->references('id_contact')->on('contacts');
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
    }
}
