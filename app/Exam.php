<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
	protected $primaryKey = 'id_exam';
    protected $fillable = ['description', 'pacient_id', 'date_exam', 'personal', 'amount', 'department_id'];

    protected $dates = ['date_exam'];

    public $timestamps = false;

    protected $table = 'exams';

    public function department()
    {
    	return $this->hasOne('App\Department', 'id_department', 'department_id');
    }

    public function pacient()
    {
    	return $this->hasOne('App\Pacient', 'id_pacient', 'pacient_id');
    }
}
