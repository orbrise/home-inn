<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Blog extends Model
{
    public function Catname()
    {
    	return $this->hasOne(Parentcat::class, 'id', 'category');
    }

    public function CountCatsBlogs()
    {
        return $this->hasMany(Parentcat::class, 'id', 'category')->where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')]);
    }
}
