<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartData;
use App\Models\Shop;
use App\Models\Currency;
use App\Models\Subscriber;
use Session;
use Config;
use \Torann\GeoIP\Facades\GeoIP;
use Mail;
use App\Models\Wishlist;
use Auth;
use App\Models\ProductAttribute;
use App\Models\Shipment;

class AjaxController extends Controller
{
    public $navs;

    public function __construct()
    {
        $geo = Geoip::getLocation(request()->ip());
    	
        $ccry = Currency::where('country' , $geo->country )
                                 ->where('rate', '!=', '0')->where('rate', '!=', '')->first();
        if(!empty($ccry)) {Config::set('convrate', $ccry->rate);} else {Config::set('convrate', 1);}
        $surl = env('APP_URL');
    	$shop = Shop::where('url', $surl)->first();
    	Config::set('shop_id', $shop->id);
    	Config::set('appurl', $surl);
    	Config::set('theme',  $shop->active_theme);
    	Config::set('backend_url', env('BACKEND_URL'));
    	Config::set('currency',  $geo->currency);
        Config::set('country',  $geo->country);

    }

    public function AddtoCart(Request $req)
    {

    	$product = Product::find($req->prodid);
    	$cartdata = CartData::where(['shop_id' => Config::get('shop_id'),
							    	 'status' => 0,
							    	  'product_id' => $req->prodid,
							    	  'session_id' => Session::getId()])->first();

    	if($cartdata == null)
    	{
    		$cart = new CartData;
    		$cart->shop_id = Config::get('shop_id');
    		$cart->product_id = $req->prodid;
    		$cart->product_title = $product->title;
    		$cart->product_qty = 1;
    		$cart->product_price = $product->d_price ? $product->d_price : $product->r_price;
    		$cart->cart_total = $product->d_price ? $product->d_price : $product->r_price;
    		$cart->session_id = Session::getId();
    		$cart->save();
    	}
    	else 
    	{
    		$cartdata->product_qty = $cartdata->product_qty+1;
    		$cartdata->cart_total = $product->r_price*($cartdata->product_qty);
    		$cartdata->save();
    	}

    	$getcart = CartData::where(['shop_id' => Config::get('shop_id'),
							    	 'status' => 0,
							    	  'session_id' => Session::getId()])->get();


    	return view(Config::get('theme').'.ajax.pages.ajaxphp', ['prodid' => $req->prodid, 'session_id' => Session::getId(), 'shop_id' => Config::get('shop_id'), 'allcart' => $getcart, 'currency' => Config::get('currency')]);
    }

    public function AddtoCart1(Request $req)
    {

        $product = Product::find($req->prodid);
        $where = ['shop_id' => Config::get('shop_id'),
        'status' => 0,
         'product_id' => $req->prodid,
         'session_id' => Session::getId()];
        if(isset($req->options) && $req->options !== ''){
            $where['options'] = $req->options;
        }
        $cartdata = CartData::where($where)->first();

        if($cartdata == null)
        {
            $cart = new CartData;
            $cart->shop_id = Config::get('shop_id');
            $cart->product_id = $req->prodid;
            $cart->product_title = $product->title;
            $cart->product_qty =  $req->qty ? $req->qty : 1;
            $cart->product_price = $req->rprice;
            $cart->cart_total = $req->rprice*$cart->product_qty;
            $cart->session_id = Session::getId();
            if(isset($req->options) && $req->options !== ''){
                $cart->options = $req->options;
            }
            $cart->save();
        }
        else 
        {
            $cartdata->product_qty = $cartdata->product_qty+($req->qty ? $req->qty : 1);
            $cartdata->cart_total = $req->rprice*($cartdata->product_qty);
            $cartdata->save();
        }

        $getcart = CartData::where(['shop_id' => Config::get('shop_id'),
                                     'status' => 0,
                                      'session_id' => Session::getId()])->get();


        return view(Config::get('theme').'.ajax.pages.ajaxphp', ['prodid' => $req->prodid, 'session_id' => Session::getId(), 'shop_id' => Config::get('shop_id'), 'allcart' => $getcart, 'currency' => Config::get('currency')]);
    }

    public function DellCartItem(Request $req)
    {
        $cart = CartData::find($req->rowid);
        $cart->status = 1;
        $cart->save();
    }

    public function GetCartItems()
    {
        $srate = Shipment::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->first();
        $getcart = CartData::where(['shop_id' => Config::get('shop_id'),
                                     'status' => 0,
                                      'session_id' => Session::getId()])->get();

        return view(Config::get('theme').'.ajax.pages.ajaxphp', ['getcartitems' => $getcart, 'srate' => $srate]);
    }

     public function GetCartItems1()
    {
      
        $getcart1 = CartData::where(['shop_id' => Config::get('shop_id'),
                                     'status' => 0,
                                      'session_id' => Session::getId()])->get();

        return count($getcart1);
    }

    public function UpdatePopupCart()
    {
        $updategetcart = CartData::where(['shop_id' => Config::get('shop_id'),
                                     'status' => 0,
                                      'session_id' => Session::getId()])->get();
        return view(Config::get('theme').'.ajax.pages.ajaxphp', ['allcart' => $updategetcart, ]);
    }

    public function UpdateItemQty(Request $req)
    {
        $cartqty = CartData::find($req->rowid);
        $cartqty->product_qty = $req->qty;
        $cartqty->cart_total = $cartqty->product_price*$req->qty;
        $cartqty->save();

        return $cartqty->cart_total;
    }

    public function Addsubscriber(Request $req)
    {
        $check = Subscriber::where(['email' => $req->email, 'shop_id' => Config::get('shop_id')])->first();
        if(!empty($check)) 
        {
            return 'no';
        }
        else {

            $new = new Subscriber;
            $new->shop_id = Config::get('shop_id');
            $new->email = $req->email;
            $new->save();
            return 'yes';
        }
    }

    public function ContactForm(Request $req)
    {
       
            $name =  $req->name;
            $email = $req->email;
            $msg =  $req->msg;  

        Mail::send(Config::get('theme').'.mails.contactform', ['name' => $name, 'email' => $email, 'msg' => $msg], function ($message)
             {
                $message->from('info@ecrafters.com', 'E Crafters');
                $message->subject('Email from E Crafter Contact Form ');
                $message->to('orbrise@gmail.com');
            });

        return 'yes';
    }

    public function AddtoWishList(Request $req)
    {
        $prodid = $req->prodid;
       if(Auth::check()){
        $new = Wishlist::firstOrCreate(['product_id' => $prodid, 'username' => Auth::user()->email],
               ['product_id' => $prodid, 'username' => Auth::user()->email]);
        } else {$new = false;}

        if($new)
        {
            return 'yes';
        } else {return 'no';}
    }

    public function GetPriceOption(Request $req)
    {
        $price =  ProductAttribute::where(['product_id' => $req->prodid, 'name' => $req->val, 'delstatus' => 0, 'shop_id' => Config::get('shop_id')])->first();
        return (float)($price->sale ? $price->sale : $price->value);
    }
}
