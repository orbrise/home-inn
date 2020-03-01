<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Checkout;
use App\Models\Shop;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\Parentcat;
use App\Models\CartData;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Currency;
use App\Models\Blog;
use App\Models\Price;
use App\Models\Shipment;
use App\Models\ProductAttribute;
use App\Models\Attroption;
use Config;
use Session;
use Mail;
use \Torann\GeoIP\Facades\GeoIP;
use Auth;
use App\User;
use App\Http\Requests\CustomerRegister;
use Validator;
use App\Models\Wishlist;
use ImageOptimizer;

class HomeController extends Controller
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
    	Config::set('currency',  $geo->currency);
        Config::set('country',  $geo->country);
        Config::set('backend_url', env('BACKEND_URL'));

    	$this->navs = Parentcat::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0, 'levels' => 0])->get();
    }
    
    public function GetCart()
    {
    return  CartData::where(['shop_id' => Config::get('shop_id'), 'status' => 0, 'session_id' => Session::getId()])->get();

    }

    public function index()
    { 
       // return env('APP_URL');
        
        $newprods = Product::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0])
                                    ->orderBy('id', 'desc')
                                    ->take(12)
                                    ->get();
        $homeliving = Product::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0, 'cat_id' => 30])
                                    ->orderBy('id', 'desc')
                                    ->take(12)
                                    ->get();

        $sofacovers = Product::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0, 'subchild_cat' => 51])
                                    ->orderBy('id', 'desc')
                                    ->take(12)
                                    ->get();
       
        $sofarunners = Product::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0, 'cat_id' => 33])
                                    ->orderBy('id', 'desc')
                                    ->take(12)
                                    ->get();

    	$curtains = Product::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0, 'cat_id' => 106])
    	                            ->orderBy('id', 'desc')
    	                            ->take(12)
    	                            ->get();
       


    	return view(Config::get('theme').'.pages.homepage', ['newprods' => $newprods, 'curtains' => $curtains, 'navs' => $this->navs, 'cartitems' => $this->GetCart(),
    	'homeliving' => $homeliving, 'sofacovers' => $sofacovers, 'sofarunners' => $sofarunners]); 
    }

    public function StoreManage($pslug, $sslug, $tag)
    {
        
    	$pricefrom = 0;
    	$priceto = 400000;
    	if(!empty($_GET['pricefrom']) &&  !empty($_GET['priceto']))
    	{
    		$pricefrom = $_GET['pricefrom'];
    	    $priceto = $_GET['priceto'];
    	} 
    	elseif(!empty($_GET['pricefrom']) &&  empty($_GET['priceto']))
    	{
    		$pricefrom = $_GET['pricefrom'];
    	}
    	elseif (empty($_GET['pricefrom']) &&  !empty($_GET['priceto']))
    	{
    		$priceto = $_GET['priceto'];
    	}

    	

    	$allcats = Parentcat::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'levels' => 0 ])->get();
    	$tags = Product::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0])->where('tag', '!=', '')->select('tag')->groupBy('tag')->get()->take(8);
    	

    	if(!empty($pslug) ) // && empty($sslug)
    	{
            $newurl = explode('category/', parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
            $pslug = $newurl[1];
            $findid = Parentcat::where(['slug' => $pslug, 'delstatus' => 0])->first();
            
            if($findid === null ){
                return view(Config::get('theme').'.pages.staticpages.404', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
            }

            $meta['title'] = $findid->meta_title ? $findid->meta_title : $findid->name;
            $meta['desc'] = $findid->meta_content ? $findid->meta_content : '';
            $meta['keywords'] = $findid->keywords;
            $meta['url'] = url('category/'.$findid->slug); 
            
            $level = $findid->levels;
            $attroptions = Attroption::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0, 
                'attrgroup' => $findid->group_attr])->get();
				
             if($level == 0){
              $type = 'cat_id';
              }
             if($level == 1){
             $type = 'subcat_id';
              }
             if($level == 2){
                $type = 'subchild_cat';
            }

            $bestsell = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), $type => $findid->id])
                                       ->orderBy('id', 'desc')
                                       ->paginate(4);

            if(!isset($_GET['orderby']) || $_GET['orderby'] == ''){
                $allprods = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), $type => $findid->id])
                    ->whereBetween('r_price', [$pricefrom, $priceto])
                    ->orderBy('id', 'desc')
                    ->paginate(24);

            } else {
                if($_GET['orderby'] == 'price_low' || $_GET['orderby'] == 'price_high'){
                    $allprods = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), $type => $findid->id])
                        ->orderBy('r_price', ( $_GET['orderby'] == 'price_high'?'DESC':'ASC'))
                        ->paginate(24);
                } else {
                    $allprods = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), $type => $findid->id])
                        ->withCount('orders')
                        ->orderBy('orders_count', 'DESC')
                        ->paginate(24);

                }

            }




    	    return view(Config::get('theme').'.pages.store', ['allprods' => $allprods, 'allcats' => $allcats, 'pcatname' => $findid->name, 'tags' => $tags, 'navs' => $this->navs, 'cartitems' => $this->GetCart(), 'attroptions' => $attroptions,'bestsell' => $bestsell, 'pcat' => $pslug, 'category' => $findid, 'meta' => $meta, 'pages' => $allprods->lastPage() ]);
    	} 

    	/*elseif (!empty($pslug) && !empty($sslug)) 
    	{
    		$findpid = Parentcat::where('slug', $pslug)->first();
    		$findsid = Parentcat::where('slug', $sslug)->first();
    		$allprods = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'),'cat_id' => $findpid->id, 'subcat_id' => $findsid->id ])->whereBetween('r_price', [$pricefrom, $priceto])->paginate(18);
    	    return view(Config::get('theme').'.pages.store', ['allprods' => $allprods, 'allcats' => $allcats, 'pcatname' => $findpid->name, 'subcatname' => $findsid->name , 'tags' => $tags, 'navs' => $this->navs, 'cartitems' => $this->GetCart()]);

    	}*/

    	elseif (!empty($tag)) 
    	{
    		$allprods = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'tag' => $tag ])->whereBetween('r_price', [$pricefrom, $priceto])->orderBy('id', 'DESC')->paginate(18);
    	    return view(Config::get('theme').'.pages.store', ['allprods' => $allprods, 'allcats' => $allcats, 'tags' => $tags, 'navs' => $this->navs, 'cartitems' => $this->GetCart()]);

    	}

    	else {
    			$allprods = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id') ])->whereBetween('r_price', [$pricefrom, $priceto])->orderBy('id', 'DESC')->paginate(18);
                
    	        return view(Config::get('theme').'.pages.store', ['allprods' => $allprods, 'allcats' => $allcats, 'tags' => $tags, 'navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    	}
    
    }

    public function StoreTag($tag= '',$pslug ='', $sslug= '')
    {
    	return $this->StoreManage($pslug, $sslug, $tag);
    }

    public function StoreCatogories($pslug ='', $sslug= '', $tag= '')
    {
    	return $this->StoreManage($pslug, $sslug, $tag);
    }

    public function SearchKeyword()
    {
        $keyword = $_GET['searchkeyword'];
        $pricefrom = 0;
        $priceto = 400000;
        if(!empty($_GET['pricefrom']) &&  !empty($_GET['priceto']))
        {
            $pricefrom = $_GET['pricefrom'];
            $priceto = $_GET['priceto'];
        } 
        elseif(!empty($_GET['pricefrom']) &&  empty($_GET['priceto']))
        {
            $pricefrom = $_GET['pricefrom'];
        }
        elseif (empty($_GET['pricefrom']) &&  !empty($_GET['priceto']))
        {
            $priceto = $_GET['priceto'];
        }
        
        $allcats = Parentcat::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'levels' => 0 ])->get();
        $tags = Product::where(['shop_id' => Config::get('shop_id'), 'delstatus' => 0])->where('tag', '!=', '')->select('tag')->groupBy('tag')->get()->take(8);

        $allprods = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id') ])
          ->whereBetween('r_price', [$pricefrom, $priceto])
          ->where('title', 'like', "%{$keyword}%")
         
          ->paginate(32);
                return view(Config::get('theme').'.pages.store', ['allprods' => $allprods, 'allcats' => $allcats, 'tags' => $tags, 'navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function ProductPage($slug = '', $id = '')
    {

        $prod = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'url' => $slug, 'id' => $id ])->first();
        
        if($prod === null ){
            return view(Config::get('theme').'.pages.staticpages.404', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
        }

        $mainattrs = ProductAttribute::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'product_id' => $prod->id])->select('attr_name','attrid')->groupBy('attr_name','attrid')->get();

    	$relates = Product::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'cat_id' => $prod->cat_id ])->get()->take(6);
        
    	return view(Config::get('theme').'.pages.productpage', ['prod' => $prod, 'relates' => $relates, 'navs' => $this->navs, 'cartitems' => $this->GetCart(), 'mainattrs' => $mainattrs]);
    }

    public function MyCart()
    {
        $srate = Shipment::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->first();
    	return view(Config::get('theme').'.pages.cart', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'srate' => $srate]);
    }

    public function RemoveCartItem($cartid = null)
    {
        $del =  CartData::find($cartid);
        $del->status = 1;
        $del->save();

        return redirect()->back();
    }

    public function Checkout()
    { 
        
        $rates = Shipment::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->get();
       $srate = Shipment::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->first();
    	return view(Config::get('theme').'.pages.checkout', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'rates' => $rates, 'srate' => $srate]);
    }

    public function CheckoutSubmit(Checkout $req)
    {
    	$cartitems =  $this->GetCart();
    	$maxorderid = Order::max('order_no');
    	$maxorderno = $maxorderid+1;
    	$email = $req->email;
        $delivery = $req->shipment;
        
   
    	Mail::send(Config::get('theme').'.mails.invoice', ['cartitems' => $cartitems, 
            'delivery' => $delivery], function ($message) use ($email)
			 {
			    $message->from('info@homes-inn.com', 'Homes-inn.com');
			   
			    $message->subject('Homes-inn.com Order Invoice ');
			    $message->to($email);
			});
	
			


    	if(!empty($cartitems))
    	{
    		foreach($cartitems as $item)
    		{
    			$insertorder = Order::firstOrCreate(
                    ['shop_id' => Config::get('shop_id'),
    			     'order_no' => $maxorderno, 'phone' => $req->phone,
    			     'product_id' => $item->product_id, 'attr_name' => $item->options],
    			     [
    			       'shop_id' => Config::get('shop_id'),
                       'order_no' => $maxorderno, 
                       'customer' => $req->email,
                       'product_id' => $item->product_id, 
                       'product_name' =>  $item->product_title, 
                       'attr_name' => $item->options,
                       'qty' => $item->product_qty, 
                       'currency' => Config::get('currency'),  
                       'price' => $item->product_price,
    			       'total' => $item->cart_total,
                       'delivery_charges' => $delivery,
                       'process' => 'Pending', 
                       'process_level' => 1, 
                       'address' => $req->address,
                       'city' => $req->city, 
                       'country' => $req->country, 
                       'phone' => $req->phone
    			          ]);
                if(!Auth::check()) {
                    $customers = Customer::firstOrCreate(['phone' => $req->phone,'email' => $req->email],[
                        'name' => $req->first_name, 'email' => $req->email, 'address' => $req->address, 'city' => $req->city, 
                        'country' => $req->country, 'phone' => $req->phone
                    ]); 
                }

    			$cartstatus = CartData::find($item->id);
    			$cartstatus->status = 1;
    			$cartstatus->save();

    		}


    		return redirect('order-placed')->with('orderid', $maxorderno);
    	}
    }

    public function OrderPlaced()
    {
        $orderid = Session::get('orderid');
        $order = Order::where('order_no', $orderid)->get();
        if(count($order))
        return view(Config::get('theme').'.pages.thankyou', ['navs' => $this->navs, 'cartitems' => $order, 'orderid' => $orderid]);
        else 
        return redirect('/');
    }

    public function ContactUs()
    {
        return view(Config::get('theme').'.pages.staticpages.contact', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function AboutUs()
    {
        return view(Config::get('theme').'.pages.staticpages.about', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function Privacy()
    {
         return view(Config::get('theme').'.pages.staticpages.privacy', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function Terms()
    {
         return view(Config::get('theme').'.pages.staticpages.terms', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function Return()
    {
         return view(Config::get('theme').'.pages.staticpages.return', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function Blogs($category = null, $catid = null)
    {
        $blogcats = Blog::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->get();
        $latest = Blog::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->orderBy('id', 'desc')->get()->take(3);
        if(!empty($category))
        {
             $blogs = Blog::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'category' => $catid])->paginate(9);
        } else {
             $blogs = Blog::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->paginate(9);
        }
       
         return view(Config::get('theme').'.pages.blogs', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'blogs' => $blogs, 'cats' => $blogcats, 'latest' => $latest]);
    }

    public function BlogView($url = null)
    {
        $blogcats = Blog::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->get();
        $latest = Blog::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id')])->orderBy('id', 'desc')->get()->take(3);
        
        $blog = Blog::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'url' => $url])->first();
        
         return view(Config::get('theme').'.pages.blogview', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'blog' => $blog, 'cats' => $blogcats, 'latest' => $latest]);
    }

    public function DoLogin(Request $req)
    {
         $email = $req->username;
         $pass = $req->password;
         $oldsession = Session::getId();


        if(Auth::attempt(['email' => $email, 'password' =>$pass ]))
        {
            $newsession = Session::getId();

            $upd = CartData::where('session_id', $oldsession)->update(['session_id' => $newsession]);
            return back()->with('successmsg', 'you are login now!');

        }else {return back()->with('errormsg', 'username / password not matched');}
    }

    public function Logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function Login()
    {
        return view(Config::get('theme').'.pages.login', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function UserLogin(Request $req)
    {
        $email = $req->username;
        $pass = $req->password;
        $oldsession = Session::getId();

        if(Auth::attempt(['email' => $email, 'password' => $pass ]))
        {
            $newsession = Session::getId();

            $upd = CartData::where('session_id', $oldsession)->update(['session_id' => $newsession]);
            return redirect('user-area');

        }else {
            return back()->with('errormsg', 'username / password not matched');
        }
    }

    public function UserArea()
    {
        return view(Config::get('theme').'.pages.userarea.dashboard', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function UserUpdate(Request $req)
    {
        $upd = User::find($req->id);
        $upd->name = $req->fname;
        $upd->address = $req->address;
        $upd->city = $req->city;
        $upd->country = $req->country;
        $upd->phone = $req->phone;
        if($upd->save())
        {
            return back()->with('successmsg', 'your infomation updated!');
        }

    }

    public function Register()
    {
         return view(Config::get('theme').'.pages.register', ['navs' => $this->navs, 'cartitems' => $this->GetCart()]);
    }

    public function RegisterCustomer(CustomerRegister $req)
    {
        $key = str_random(60);
        $email = $req->email;
        $fname = $req->fname;
        $new =  new User;
        $new->name = $fname;
        $new->email = $email;
        $new->password =  bcrypt($req->password);
        $new->remember_token = $key ;
        $new->token_status = 1;
        $new->verify_status = 1;
        if($new->save())
        {
            /*Mail::send(Config::get('theme').'.mails.accountcreated', ['key' => $key, 'email' => $email, 'fname' => $fname], function ($message) use ($email)
             {
                $message->from('info@ecrafters.com', 'E Crafters');
                $message->subject('E Crafters Email Verification');
                $message->to($email);
            });*/

            return back()->with('successmsg', 'We sent you an email, pelase verify your email!');
        }
    }

    public function AccountVerify($token = '', $email = '')
    {
        $act = User::where(['email' => $email,'remember_token' => $token, 'verify_status' => 1, 'token_status' => 1])->update(['verify_status' => 0, 'token_status' => 0]);
        if($act){
            return  view(Config::get('theme').'.pages.accountverify', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'error' => 0]);
        } else { return  view(Config::get('theme').'.pages.accountverify', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'error' => 1]); }
        
    }

    public function ChangePass()
    {
        return  view(Config::get('theme').'.pages.userarea.passchange', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'error' => 0]);
    }

    public function UpdatePass(Request $req)
    {
        
        Validator::make($req->all(), [
        'pass' => 'required|min:6',
        'rpass' => 'required|same:pass',
        ])->setAttributeNames(['pass' => 'Password', 'rpass' => 'Repeat Password'])->validate();

        $upd = User::find($req->id);
        $upd->password = bcrypt($req->pass);
        if($upd->save())
        {
            return back()->with('successmsg', 'Password Updated!');
        }
    }

    public function CustomerOrders()
    {
        $orders = Order::where(['customer'=> Auth::user()->email, 'status' => 0])->select('order_no','created_at','currency', 'process_level')
        ->groupBy('order_no','created_at','currency', 'process_level')->get();
        
        return  view(Config::get('theme').'.pages.userarea.orders', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'error' => 0, 'orders' => $orders]);
    }

    public function OrderView($orderno = null)
    {
        if($orderno == '')
        {
            return redirect('/');
        }
        else {

            $orderf = Order::where(['status' => 0, 'order_no' => $orderno])->first();
            $orders = Order::where(['status' => 0, 'order_no' => $orderno])->get();
            return  view(Config::get('theme').'.pages.userarea.orderview', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'error' => 0, 'orderf' => $orderf, 'orders' => $orders]);
        }
    }


    public function WishlistView()
    {
        $wishlists = Wishlist::where(['delstatus' => 0, 'username' => Auth::user()->email])->get();
         return  view(Config::get('theme').'.pages.userarea.wishlistview', ['navs' => $this->navs, 'cartitems' => $this->GetCart(), 'error' => 0, 'wishlists' => $wishlists]);
    }

    public function RemoveWishlist($id = '')
    {
        $upd = Wishlist::find($id);
        $upd->delstatus = 1;
        if($upd->save())
        {
            return back()->with('successmsg', 'Item Removed form your Wishlist');
        }
    }

    public function BuyNow($prodid = null, $rprice = null)
    {
                $price = Price::where(['delstatus' => 0, 'country' => Config::get('country'), 'prod_id' => $prodid])->first();

        $product = Product::find($prodid);
         $cartdata = CartData::where(['shop_id' => Config::get('shop_id'),
                                     'status' => 0,
                                      'product_id' => $prodid,
                                      'session_id' => Session::getId()])->first();

        if(empty($cartdata))
        {
            $cart = new CartData;
            $cart->shop_id = Config::get('shop_id');
            $cart->product_id = $prodid;
            $cart->product_title = $product->title;
            $cart->product_qty = 1;
            $cart->product_price = $rprice;
            $cart->cart_total = $rprice;
            $cart->session_id = Session::getId();
            $cart->save();
        }
        else 
        {
            $cartdata->product_qty = $cartdata->product_qty+1;
            $cartdata->cart_total = $rprice*($cartdata->product_qty);
            $cartdata->save();
        }

        $rates = Shipment::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'country' => Config::get('country')])->get();
       $srate = Shipment::where(['delstatus' => 0, 'shop_id' => Config::get('shop_id'), 'country' => Config::get('country')])->first();

        $getcart = CartData::where(['shop_id' => Config::get('shop_id'),
                                     'status' => 0,
                                      'session_id' => Session::getId()])->get();


        return redirect('/checkout');
    }

    

}
