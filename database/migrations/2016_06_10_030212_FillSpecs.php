<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillSpecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $name_specs = ["Odontologia General", "Ortodoncia", "OdontoPedatría", "Prostodoncia", "Periodoncia"
        ,"Endodoncia", "Cariología", "Odontología estética o cosmética", "Implantología oral"];
        
        foreach ($name_specs as $value) {
         
            DB::table('specialities')->insert([
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
        //
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('specialities')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
