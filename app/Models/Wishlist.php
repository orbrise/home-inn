<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [

    	'product_id','username','created_at','updated_at',
    ];


    public function Prodinfo()
    {
    	return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function ProdImg()
    {
    	return $this->hasOne(ProductImg::class, 'product_id', 'product_id');
    }
}
