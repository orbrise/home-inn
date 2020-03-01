<div class="product-list product">
    <div class="row product-list-row">
        <div class="col col-sm-3 col-lg-3">
            <div class="product-image">
                <div class="image"><img
                            src="@if(!empty($prod->ProdImg->location)){{env('BACKEND_URL')}}/{{$prod->ProdImg->location}}/{{$prod->ProdImg->file_name}}@endif"
                            alt=""></div>
            </div>
            <!-- /.product-image -->
        </div>
        <!-- /.col -->
        <div class="col col-sm-9 col-lg-9">
            <div class="product-info">
                <h3 class="name"><a
                            href="{{url('/product')}}/{{strtolower($prod->url)}}/i/{{$prod->id}}"
                            target="_blank">{{str_limit($prod->title, $limit=28, $end='...')}}</a>
                </h3>

                <div class="rating rateit-small"></div>
                <div class="product-price">
                    @if($prod->d_price > 0)
                        <small><del>Rs {{$prod->r_price}}</del></small>
                        <span class="price"> Rs {{$prod->d_price}} </span>
                    @else
                        <span class="price"> Rs {{$prod->r_price}} </span>
                    @endif
                </div>
                <!-- /.product-price -->
                <div class="description m-t-10">{{$prod->short_desc}}</div>
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">
                            @if(is_numeric($prod->r_price))
                                <li class="add-cart-button btn-group">
                                    <button id="addtocart"
                                            prod="{{$prod->id}}"
                                            class="btn btn-primary icon"
                                            data-toggle="dropdown"
                                            type="button"><i
                                                class="fa fa-shopping-cart"></i>
                                    </button>
                                    <button class="btn btn-primary cart-btn"
                                            type="button">Add to cart
                                    </button>
                                </li>

                                <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon"
                                            data-toggle="dropdown"
                                            type="button"><i
                                                class="fa fa-bolt"></i>
                                    </button>
                                    <a href="@if(is_numeric($prod->r_price)){{ url('/buynow')}}/{{$prod->id}}/{{$prod->r_price}}@endif"
                                       class="btn btn-primary cart-btn"
                                       type="button">Buy Now</a>
                                </li>
                                <li class="lnk wishlist"><a
                                            id="addtowishlist"
                                            wishprod="{{$prod->id}}"
                                            class="add-to-cart"
                                            href="#!" title="Wishlist">
                                        <i class="icon fa fa-heart"></i>
                                    </a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- /.action -->
                </div>
                <!-- /.cart -->

            </div>
            <!-- /.product-info -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.product-list-row -->

</div>
<!-- /.product-list -->