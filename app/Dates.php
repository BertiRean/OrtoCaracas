<?php

namespace App/Dates;

use Illuminate\Database\Eloquent\Model;

class Dates extends Model {

	protected $table = 'dates';
	public $timestamps = false;
	protected $fillable = array('consult');

}