<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $primaryKey = 'id_department';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function exams()
    {
    	return $this->hasMany('App\Exam', 'department_id', 'id_department');
    }

}
