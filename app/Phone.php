<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //
    protected $table = "phones";

    public $timestamps = false;

    protected $fillable = ['phone_number'];

    public function contact()
    {
    	return $this->belongsTo('App\Contact', 'contact_id', 'id_contact');
    }

}
