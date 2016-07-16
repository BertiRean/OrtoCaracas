<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillDeparments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $name_departments = ["Radiografía Odontologica", "Radiografía Medica", "Mamografía", "Laboratorio"
        , 'Ecosonografía'];
        
        foreach ($name_departments as $value) {
         
            DB::table('departments')->insert([
                'name' => $value
            ]);   
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('specialities')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
