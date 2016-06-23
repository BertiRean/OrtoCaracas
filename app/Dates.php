<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dates extends Model {

	protected $table = 'dates';
	public $timestamps = false;
	protected $fillable = ['doctor_id', 'pacient_id', 'date_consult'];
	public $primaryKey = 'id_date';

	public function doctor()
	{
		return $this->hasOne('App\Doctor', 'id_doctor', 'doctor_id');
	}

	public function pacient()
	{
		return $this->hasOne('App\Pacient', 'id_pacient', 'pacient_id');
	}
}