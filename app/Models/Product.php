<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Product extends Model
{
    public function ProdImg()
    {
    	return $this->hasOne(ProductImg::class, 'product_id', 'id')->where(['delstatus' =>0, 'coverimg' => 1]);
    }

    public function AllProdImgs()
    {
    	return $this->hasMany(ProductImg::class, 'product_id', 'id')->where(['delstatus' =>0]);
    }

    public function CatName()
    {
    	return $this->hasOne(Parentcat::class, 'id', 'cat_id');
    }



    public function SubCatName()
    {
        return $this->hasOne(Parentcat::class, 'id', 'subcat_id');
    }

    public function AllProdImgss()
    {
        return $this->hasMany(ProductImg::class, 'product_id', 'id')->where(['delstatus' =>0])->where('coverimg', '!=', 1);
    }

    public function Price()
    {
        return $this->hasOne(Price::class, 'prod_id', 'id')->where(['delstatus' => 0, 'country' => Config::get('country')]);
    }

    public function GetBrand()
    {
        return $this->hasOne(Price::class, 'product_id', 'id')->where(['delstatus' => 0]);
    }

    public  function orders(){
        return $this->hasMany(Order::class, 'product_id');
    }

    
}
