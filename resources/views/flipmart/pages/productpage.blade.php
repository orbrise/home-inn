@extends(Config::get('theme').'.layout.master')
@section('title', $prod->title)
@section('desc', $prod->short_desc)
@push('css')
<link href="{{ asset('public/'.Config::get('theme').'/assets/ninja-slider/ninja-slider.css')}}" rel="stylesheet" />
<link href="{{ asset('public/'.Config::get('theme').'/assets/ninja-slider/thumbnail-slider.css')}}" rel="stylesheet" type="text/css" />
<style>
    .border{border: 2px solid red;}
    .single-product .quantity-container .cart-quantity .quant-input input {
        padding: 5px !important;
        text-align: center;
    }
    .zoom {
        display:inline-block;
        position: relative;
    }
    .zoom img {
        display: block;
    }
    .zoom img::selection { background-color: transparent; }
</style>
@endpush
@section('content')
        <!-- ============================================== HEADER : END ============================================== -->
<div class="cnt-home body-content outer-top-xs">
    <div class=''>
        <div class='row single-product'>
            <div class='col-md-12'>
                <div class="detail-block">
                    <div class="row">
                        <!--brerad crumbs-->
                        <div class="breadcrumb">
                            <div class="breadcrumb-inner">
                                <ul class="list-inline list-unstyled">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">{{$prod->CatName->name}}</a></li>
                                    @if(!empty($prod->SubCatName->name))
                                        <li class='active'>{{$prod->SubCatName->name}}</li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /.breadcrumb-inner -->
                            <!-- /.container -->
                        </div>
                        <!-- /.breadcrumb -->
                    </div>
                    <div class="row  wow fadeInUp">
                        <div class="col-md-5 ">
                            <!--Carousel start-->
                            <div style="margin:0px; font-size: 0px!important;">
                                <div id="thumbnail-slider" style="float:left;">
                                    <div class="inner">
                                        <ul>
                                            @forelse($prod->AllProdImgs as $img)
                                                <li>
                                                    <a class="thumb" href="{{env('BACKEND_URL')}}/{{$img->location}}/{{$img->file_name}}"></a>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <div id="ninja-slider" style="float:left;font-size:0px">
                                    <div class="slider-inner">
                                        <ul>
                                            @forelse($prod->AllProdImgs as $img1)
                                                <li class="zoom"><img class="ns-img" src="{{env('BACKEND_URL')}}/{{$img1->location}}/{{$img1->file_name}}"/></li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="quantity-container info-container">
                                <div class="row stickyq" style=" background-color: white;margin-left: auto">
                                    <div class="col-xs-2 col-md-1 hidesm" style="padding:0px">
                                        <span class="label">Qty :</span>
                                    </div>
                                    <div class="col-xs-2 col-md-2" style="padding: 0px">
                                        <div class="cart-quantity inskew">
                                            <div class="quant-input">
                                                <input type="number" value="1" min="1" id="qtyp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-8 col-md-7 mypadding" style="padding: 0px">
                                        <button data-target="#stop" id="addtocartcheck" prod="{{$prod->id}}" class="btn color1"><span class="hidesm"><i class="fa fa-shopping-cart inner-right-vs"></i></span><label class="inskew" style="margin: 5px"> ADD TO CART </label></button>
                                        <a id="upprice" href="@if(is_numeric($prod->r_price)) {{env('APP_URL')}}/buynow/{{$prod->id}}/{{$prod->r_price}} @else #  @endif" class="btn color2"><span class="hidesm"><i class="fa fa-shopping-cart inner-right-vs"></i></span> <label class="inskew" style="margin: 5px">BUY NOW</label></a>
                                    </div>
                                    <div class="col-xs-2 col-md-2" style=" padding: 0px;">
                                        <a wishprod="722" id="addtowishlist" class="btn wish" style="color:white;background: -webkit-linear-gradient(left,#48cfef,#16a4da);">
                                            <label class="inskew" style="margin: 5px"><i class="far fa-heart"></i></label>
                                        </a>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->
                            <!-- /.quantity-container -->
                        </div>
                        <!--Carousel end-->
                        <div class='col-sm-6 col-md-7 product-info-block customparent' id="scroll">
                            <div  class="product-info customchild">
                                <h1 id="stop" class="name">{{$prod->title}}</h1>
                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.rating-reviews -->
                                <div class="price-container info-container m-t-20">
                                    @if($prod->qty > 0)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form>
                                                <input type="hidden" id="prod_id" value="{{$prod->id}}">
                                                <?php
                                                $prices = explode('-',($prod->d_price > 0 ? $prod->d_price : $prod->r_price));
                                                ?>
                                                <input type="hidden" id="prprice" value="{{$prices[0]}}">
                                                @forelse($mainattrs as $mainattr)
                                                    <div class="form-group form-inline">
                                                        <label>{{$mainattr->attr_name}}:</label>
                                                        <select class="form-control " id="priceoption">
                                                            <option value="none">Select Option</option>
                                                            @forelse($mainattr->Attroptions as $opt)
                                                                <option value="{{$opt->name}}">{{$opt->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        <br>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if($prod->d_price > 0)
                                                    <div><small><del>Rs {{$prod->r_price}}</del></small></div>
                                                    <span class="price"> Rs <span id="sprice">{{$prod->d_price}}</span></span>
                                                @else
                                                    <span class="price"> Rs <span id="price">{{$prod->r_price}}</span></span>
                                                @endif
                                                <span id="hideinput"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.price-container -->
                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">{{ $prod->qty > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.stock-container -->
                                <div class="description-container m-t-20">
                                    {{$prod->short_desc}}
                                </div>
                                <!-- /.description-container -->
                                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="description" class="tab-pane in active">
                                                <h1>DESCRIPTION</h1>
                                                <p class="text">{!!$prod->long_desc!!}</p>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div id="review" class="tab-pane">
                                                <div class="product-tab">
                                                    <div class="product-reviews">
                                                        <h1 class="">Customer Reviews</h1>
                                                        <div class="reviews">
                                                            <div class="review">
                                                                <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                                <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                            </div>
                                                        </div>
                                                        <!-- /.reviews -->
                                                    </div>
                                                    <!-- /.product-reviews -->
                                                    <div class="product-add-review">
                                                        <h4 class="title">Write your own review</h4>
                                                        <div class="row">
                                                            <div class="rating1 rating2">
                                                                <!--
                                                                   --><a href="#5" title="Give 5 stars">★</a><!--
                                                   --><a href="#4" title="Give 4 stars">★</a><!--
                                                   --><a href="#3" title="Give 3 stars">★</a><!--
                                                   --><a href="#2" title="Give 2 stars">★</a><!--
                                                   --><a href="#1" title="Give 1 star">★</a>
                                                            </div>
                                                        </div>
                                                        <div class="review-form">
                                                            <div class="form-container">
                                                                <form role="form" class="cnt-form">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                                <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            <div class="form-group">
                                                                                <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                                <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                                <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.row -->
                                                                    <div class="action text-right">
                                                                        <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </form>
                                                                <!-- /.cnt-form -->
                                                            </div>
                                                            <!-- /.form-container -->
                                                        </div>
                                                        <!-- /.review-form -->
                                                    </div>
                                                    <!-- /.product-add-review -->
                                                </div>
                                                <!-- /.product-tab -->
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.product-tabs -->
                            </div>
                            <!-- /.product-info -->
                        </div>
                        <!-- /.col-sm-12 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.col -->
            <div class="clearfix"></div>
        </div>
        <!-- /.row -->
        <div class="row" style="margin-top: 10px">
            <!-- ========= UPSELL PRODUCTS ========== -->
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">upsell products</h3>
                <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                    @forelse($relates as $rel)
                        <div class="item item-carousel">
                            <div class="products">
                                @ProductGrid(['prod' => $rel])
                                @endProductGrid
                                        <!-- /.product -->
                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                    @empty
                    @endforelse
                </div>
                <!-- /.home-owl-carousel -->
            </section>
            <!-- /.section -->
            <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/jquery.zoom.min.js')}}"></script>
<script>
    $('.zoom').zoom();
</script>
<script src="{{asset('public/'.Config::get('theme').'/assets/ninja-slider/ninja-slider.js')}}"></script>
<script src="{{asset('public/'.Config::get('theme').'/assets/ninja-slider/thumbnail-slider.js')}}" type="text/javascript"></script>
@include(Config::get('theme').'.ajax.script')
@include(Config::get('theme').'.ajax.ajax');
@endpush