<?php

namespace App/Doctor;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {

	protected $table = 'doctor';
	public $timestamps = false;
	protected $fillable = array('name', 'ci', 'email', 'spec_id');

	public function specialitys()
	{
		return $this->belongsToMany('Speciality', 'id');
	}

	public function doctor_dates()
	{
		return $this->hasMany('Dates', 'doctor_id');
	}

	public function doctor_consults()
	{
		return $this->hasMany('Consult', 'doctor_id');
	}

}