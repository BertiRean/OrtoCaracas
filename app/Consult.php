<?php

namespace App/Consult;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model {

	protected $table = 'consult';
	public $timestamps = false;
	protected $fillable = array('doctor_id', 'description', 'spec_consult');

}