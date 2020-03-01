<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function(){

Route::get('/', 'HomeController@index');
Route::get('category/{pslug?}/{opt?}/{tag?}','HomeController@StoreCatogories');
Route::get('search', 'HomeController@SearchKeyword');
Route::get('tags/{tag?}','HomeController@StoreTag');
Route::get('product/{slug}/i/{id}', 'HomeController@ProductPage');
Route::get('/cart', 'HomeController@MyCart');
Route::get('/removecart/{cartid}', 'HomeController@RemoveCartItem');
Route::get('/checkout', 'HomeController@Checkout');
Route::post('/submmitcheckout', 'HomeController@CheckoutSubmit');
Route::get('/order-placed', 'HomeController@OrderPlaced');
Route::get('/contact', 'HomeController@ContactUs');
Route::get('/about-us', 'HomeController@AboutUs');
Route::get('/privacy-policy', 'HomeController@Privacy');
Route::get('/terms', 'HomeController@Terms');
Route::get('/return-policy', 'HomeController@Return');
Route::get('/blogs/{category?}/{catid?}', 'HomeController@Blogs');
Route::get('/blog/{url?}', 'HomeController@BlogView');
Route::post('/dologin', 'HomeController@DoLogin');
Route::post('/dologin1', 'HomeController@UserLogin');
Route::get('/logout', 'HomeController@Logout');
Route::get('/login', 'HomeController@Login')->name('login');
Route::get('/register', 'HomeController@Register');
Route::post('/registercustomer', 'HomeController@RegisterCustomer');
Route::get('/verification/token/{token}/{email}', 'HomeController@AccountVerify');
Route::get('/buynow/{prodid}/{rprice}', 'HomeController@BuyNow');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/user-area', 'HomeController@UserArea');
        Route::post('/userupdate', 'HomeController@UserUpdate');

        Route::get('/changepass', 'HomeController@ChangePass');
        Route::post('/updatepass', 'HomeController@UpdatePass');
        Route::get('/customer-orders', 'HomeController@CustomerOrders');
        Route::get('/orderview/{orderno}', 'HomeController@OrderView');
        Route::get('/wishlist-view', 'HomeController@WishlistView');
        Route::get('/removewishlist/{id}', 'HomeController@RemoveWishlist');

    });

//ajax routes
Route::post('/getpriceforthisoption', 'AjaxController@GetPriceOption');

Route::post('/addtocart', 'AjaxController@AddtoCart');
Route::post('/addtocart1', 'AjaxController@AddtoCart1');
Route::post('/deltocartitem', 'AjaxController@DellCartItem');
Route::post('/getcartinfo','AjaxController@GetCartItems');
Route::post('/getcartinfo1','AjaxController@GetCartItems1');
Route::post('/updatecartpopup','AjaxController@UpdatePopupCart');
Route::post('/updatetitemqty','AjaxController@UpdateItemQty');
Route::post('/addsubscriber','AjaxController@Addsubscriber');
Route::post('/contactform','AjaxController@ContactForm');
Route::post('/addtowishlist','AjaxController@AddtoWishList');

//  end ===
});
