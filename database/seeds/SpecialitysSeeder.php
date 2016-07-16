<?php

use Illuminate\Database\Seeder;

class SpecialitysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_specs = ["Odontologia General", "Ortodoncia", "OdontoPedatría", "Prostodoncia", "Periodoncia"
        ,"Endodoncia", "Cariología", "Odontología estética o cosmética", "Implantología oral"];

        for ($i=0; $i < 9; $i++)
        {
		    	DB::table('specialities')->insert(
		    	[
		    		'name' => $name_specs[$i],
		    	]

		    );
		}

    }
}
