<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";

    public $timestamps = false;

    protected $primaryKey = "id_contact";

    protected $fillable = ['email', 'phone', 'phone1', 'address'];
}
