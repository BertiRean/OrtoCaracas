<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $table = 'expenses';

    public $primaryKey = 'id_expense';

    protected $fillable = ['description', 'bill_number', 'amount', 'date'];

    protected $dates = ['date'];

    public $timestamps = false;
}
