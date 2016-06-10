<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model {

	protected $table = 'specialities';
	public $timestamps = false;
	protected $fillable = array('name');
	protected $primaryKey = 'id_speciality';

	public function doctors()
	{
		return $this->belongsToMany('App\Doctor', 'doctor_specs', 'spec_id', 'doctor_id');
	}

}