<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model 
{

	protected $table = 'consults';
	public $timestamps = false;
	protected $fillable = array('doctor_id', 'description', 'amount', 'observations');

	protected $dates = ['date_consult'];

	public $primaryKey = 'id_consult';


	public function doctor()
	{
		return $this->hasOne('App\Doctor', 'id_doctor', 'doctor_id');
	}

	public function pacient()
	{
		return $this->hasOne('App\Pacient', 'id_pacient', 'pacient_id');
	}

}