@if(!empty($allcart))
             <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner" id="cartcount">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count">{{count($allcart)}}</span></div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign">Rs</span><span class="value">{{$allcart->sum('cart_total')}}</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li id="insertcart">
                
                    @forelse($allcart as $item)
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="@if(!empty($item->ProdImg->location)){{Config::get('backend_url')}}/{{$item->ProdImg->location}}/{{$item->ProdImg->file_name}}@endif" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">{{$item->product_title}}  {!! $item->options ? '<div>('.$item->options.')</div>' : null !!}</a></h3>
                      <div class="price">Rs{{$item->cart_total}}</div>
                    </div>

                      <div class="col-xs-1 action">
                          <a href="{{ url('removecart/'.$item->id) }}" class="remove" aria-label="Remove this item" data-product_id="134" data-product_sku=""><i class="fa fa-trash"></i></a>                                         </div>
                    
                  </div>
                </div>
                @empty
                @endforelse
               

                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>Rs{{$allcart->sum('cart_total')}}</span> </div>
                  <div class="clearfix"></div>
                  <a href="{{ url('/cart')}}" class="btn color1 m-t-20" style="width: 48%">Cart</a> 
                  
                  <a href="{{  url('/checkout')}}" class="btn color2 m-t-20" style="width: 48%">Checkout</a>
                </div>
                <!-- /.cart-total-->
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          
           @endif


           @if(!empty($getcartitems))

<div style="padding-left: 10px;">
          <label class="f-16">PRICE DETAILS</label>
          <hr style="margin-top: 0px;margin-bottom: 10px;">
              <div class="fk">
                Price({{count($getcartitems)}}-Items):
                <span class="f-r">Rs: {{$getcartitems->sum('cart_total')}}</span>
              </div>
              <div class="fk" style="margin-top: 5px; margin-bottom: -5px;">
                Delivery Charges:
                <span class="f-r">{{$srate->normal_rates}}</span>
              </div>
              <hr style="width: 100%; border-top: 1px dotted grey;">
              <div style="font-size: 15px; margin-top: 10px;">
                Amount Payable:
                <span class="f-r"><b>Rs: {{$getcartitems->sum('cart_total')+$srate->normal_rates}}</b></span>
              </div>
              <hr style="margin-top: 15px; margin-bottom: 10px;">
              <div class="f-17" style="margin-top: 10px; margin-bottom: 10px;">
                
              </div>
        </div>
                

@endif