<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    protected $table = "Pacient";

    public $timestamps = false;

    protected $primaryKey = "idPacient";

    protected $fillable = ['name_pacient', 'ci_pacient', 'sex', 'birth_date', 'phone_pacient'];

    public function getAge()
    {
    	$year = date_parse($this->birth_date);
    	$curr_year = date("Y");

    	return $curr_year - $year["year"];
    }
}
