<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class ProductAttribute extends Model
{
    public function Attroptions()
    {
    	return $this->hasMany(Attroption::class, 'attrgroup', 'attrid');
    }
}
