<?php

namespace App/Speciality;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model {

	protected $table = 'speciality';
	public $timestamps = false;
	protected $fillable = array('name');

}