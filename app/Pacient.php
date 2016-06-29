<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pacient extends Model
{
    protected $table = "pacients";

    public $timestamps = false;

    protected $primaryKey = "id_pacient";

    protected $fillable = ['name', 'ci', 'sex', 'birth_date', 'contact_id'];

    protected $dates = ['birth_date'];

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
        return $this->hasMany('App\Dates', 'pacient_id', 'id_pacient');
    }

    public function is_birthday()
    {
        $actual_date = date('d-m');
        if($this->birth_date->format('d-m') == $actual_date)
            return true;
        else
            return false;
    }
    
}
