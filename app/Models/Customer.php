<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [

    	'name','email','password', 'created_at', 'updated_at', 'delstatus', 'address', 'city', 'country', 'phone',
    ];
}
