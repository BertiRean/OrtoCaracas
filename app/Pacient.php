<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    protected $table = "pacients";

    public $timestamps = false;

    protected $primaryKey = "id_pacient";

    protected $fillable = ['name', 'ci', 'sex', 'birth_date', 'contact_id'];

    public function contact()
    {
    	return $this->hasOne('App\Contact', 'id_contact', 'contact_id');
    }

    
}
