<div class="product hot-deals">
    <div class="hot-deal-wrapper">
    <div class="product-image">
        <div class="image">
            <a target="_blank" href="{{url('/product')}}/{{strtolower($prod->url)}}/i/{{$prod->id}}">
                <img style="{{ $prod->qty == 0 ? 'opacity:0.3': '' }}" src="{{ asset('public/'.Config::get('theme').'/assets/images/blank.gif')}}"
                     data-echo="@if(!empty($prod->ProdImg->location)){{env('BACKEND_URL')}}/{{$prod->ProdImg->location}}/{{$prod->ProdImg->file_name}}@endif"
                        alt="">
            </a>
        </div>
        @if($prod->qty == 0)
            <div class="sale-offer-tag"><span>Out of stock</span></div>
        @elseif($prod->d_price > 0)
        <div class="sale-offer-tag"><span>{{ round((((float)$prod->r_price-(float)$prod->d_price)/(float)$prod->r_price)*100) }}%<br>off</span></div>
        @endif
        <!-- /.image -->
    </div>
    </div>
    <!-- /.product-image -->
    <div class="product-info text-left">
        <h3 class="name"><a
                    href="{{url('/product')}}/{{strtolower($prod->url)}}">{{str_limit($prod->title, $limit=25, $end='...')}}</a>
        </h3>
        <div class="rating rateit-small"></div>
        <div class="description"></div>
        <div class="product-price">
            @if($prod->d_price > 0)
            <div></div>
            <span class="price"> Rs {{$prod->d_price}} <del style="color:red">&nbsp;{{$prod->r_price}}&nbsp;</del></span>
            @else
                <span class="price"> Rs {{$prod->r_price}} </span>
            @endif
        </div>
        <!-- /.product-price -->
    </div>
    <!-- /.product-info -->
    {{--<div class="cart clearfix animate-effect">
        <div class="action">
            <ul class="list-unstyled">
                @if(is_numeric($prod->r_price))
                    <li class="add-cart-button btn-group">
                        <button id="addtocart" prod="{{$prod->id}}" class="btn btn-primary icon" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </li>
                    <li class="lnk wishlist">
                        <a id="addtowishlist" wishprod="{{$prod->id}}" class="add-to-cart" href="#!" title="Wishlist">
                            <i class="icon fa fa-heart"></i>
                        </a>
                    </li>
                    <li class="lnk">
                        <a class="add-to-cart" href="@if(is_numeric($prod->r_price)){{ url('/buynow')}}/{{$prod->id}}/{{$prod->r_price}}@endif"
                                       title="Buy Now"> <i
                                    class="icon fa fa-bolt"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.action -->
    </div>--}}
    <!-- /.cart -->
</div>