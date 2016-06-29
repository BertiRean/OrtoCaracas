<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_Speciality extends Model {

	protected $table = 'doctor_specs';
	public $timestamps = false;
	protected $fillable = ['spec_id', 'doctor_id'];

}