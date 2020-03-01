<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Parentcat extends Model
{
    public function newQuery()
    {
        return parent::newQuery()->orderByRaw('ISNULL(sort_order), sort_order');
    }

    public function CountCats()
    {
    	return $this->hasMany(Product::class, 'cat_id', 'id')->where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')]);
    }


    public function Subcats()
    {
    	return $this->hasMany(Parentcat::class, 'level_id', 'id')->where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')]);
    }

    public function SubcatsChild()
    {
        return $this->hasMany(Parentcat::class, 'level_id', 'id')->where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')]);
    }


    public function CountSubCats()
    {
    	return $this->hasMany(Product::class, 'subcat_id', 'id')->where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')]);
    }


}
