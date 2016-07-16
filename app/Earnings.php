<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Earnings extends Model
{
    //
    protected $table = 'earnings';

    public $primaryKey = 'id_earning';

    protected $fillable = ['date', 'mount', 'department_id', 'doctor_id'];

    protected $dates = ['date'];

    public $timestamps = false;


    public function department()
    {
    	return $this->hasMany('App\Department', 'id_department', 'department_id');
    }

    public function doctor()
    {
        return $this->hasOne('App\Doctor', 'id_doctor', 'doctor_id');
    }
}
