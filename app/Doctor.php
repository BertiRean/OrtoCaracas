<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {

	protected $table = 'doctors';

	public $timestamps = false;
	
	protected $fillable = array('name', 'ci', 'bank_account', 'contact_id');

	protected $primaryKey = "id_doctor";

	public function specs()
	{	
		return $this->belongsToMany('App\Speciality', 'doctor_specs', 'doctor_id', 'spec_id');
	}

	public function contact()
	{
		return $this->hasOne('App\Contact', 'id_contact', 'contact_id');
	}

	public function phones()
	{
		return $this->hasMany('App\Phone', 'contact_id', 'contact_id');
	}

	public function dates()
	{
		return $this->hasMany('App\Dates', 'doctor_id', 'id_doctor');
	}
}