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
    	$curr_year = $this->birth_date;

    	
    }
}
