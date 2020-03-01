<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartData extends Model
{

	public function ProdImg()
    {
    	return $this->hasOne(ProductImg::class, 'product_id', 'product_id')->where(['delstatus' =>0, 'coverimg' => 1]);
    }


    // protected $fillable = 
    // [
    // 	'product_id','product_qty',
    // ];
}
