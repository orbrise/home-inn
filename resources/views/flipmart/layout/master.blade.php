<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="all">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Home Inn - Best Place for Shopping')</title>
    <meta name="description" content="@yield('desc')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('url')" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="object" />
    <meta property="og:title" content="@yield('title', 'Home Inn')" />
    <meta property="og:description" content="@yield('desc')" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:site_name" content="Home Inn" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="@yield('desc')" />
    <meta name="twitter:title" content="@yield('title', 'Home Inn')" />
    <!-- End:Meta -->
    <!--icon-->
    <link rel="icon" href="{{ asset('public/flipmart/assets/images/favicon.png')}}" type="image/gif" sizes="16x16">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/bootstrap.min.css')}}">
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/drawer/drawer.css')}}">
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/bootstrap-select.min.css')}}">
    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('public/'.Config::get('theme').'/assets/css/umer.css')}}">
    <style>.alertify-notifier .ajs-message .ajs-error .ajs-visible {color:white !important;}</style>
    @stack('css')
            <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
</head>
<body class="drawer drawer--left" >
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">


    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container-fluid">
            <div class="header-top-inner">
                <!-- /.cnt-account -->
                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                    </ul>
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <!--Sticky Menu====-->
    <div class="container-fluid hide main-header" id="12345" style="position: fixed; padding-top:5px;">
        <div class="row" style="padding-left: 0px">
            <div class="col-xs-1 col-sm-1">
                <!-- Mobile Nav Menu -->
                <!-- Use any element to open the sidenav -->
                
            </div>
            <div class="col-sm-9 col-xs-9" style="color: white; margin: 0px;padding: 0px 5px">
                <div class="col-xs-12 col-sm-12 col-md-5 top-search-holder" style="padding-right:0px;">
                    <div class="search-area">
                        <form method="get" action="{{ url('/search')}}">
                            <div class="control-group">
                                <input class="search-field" name="searchkeyword" placeholder="Search here...">
                                <button type="submit" class="search-button"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-2" style="margin: 6px 0px; padding: 0px;">
                <a href="{{ url('/cart')}}" style="color: white; text-decoration: none; ">
                    <span><i class="fa fa-shopping-cart" style="color: white; font-size: 25px; margin:0px 10px; "></i></span>
                    <div class="counter1"><span id="mc">{{count($cartitems)}}</span></div>
                </a>
            </div>
        </div>
    </div>
    <!--End Sticky Menu-->
    <div class="main-header fixed">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 logo-holder" id="custom1">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{ url('/')}}"> <img src="{{ asset('public/'.Config::get('theme').'/assets/images/homeinn.png')}}" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->
                <!-- small stuff -->
                <div class="container-fluid" id="dragon">
                    <div class="row m-3">
                        <div style="margin-top: 0px;" class="col-xs-1 col-sm-1">

                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-1 logo-holder" id="dragon">
                            <!-- ============================================================= LOGO ============================================================= -->
                            <div class="logo"> <a href="{{ url('/')}}"> <img src="{{ asset('public/'.Config::get('theme').'/assets/images/homeinn.png')}}" alt="logo"> </a> </div>
                            <!-- ==== LOGO : END ============================= -->
                        </div>
                        <!-- /.logo-holder -->
                        <div class="col-xs-3 col-sm-2" style="color: white; margin: 0px; float: right;">
                            <a href="tel:03419492200" style="color: white; text-decoration: none; padding-right: 4px;font-size:24px;"><span><i class="fas fa-phone"></i></span></a>
                            <!--<a href="#" style="color: white; text-decoration: none; padding-right: 4px;"><span><i class="far fa-heart" style="color: white;"></i></span></a>
                               <a href="#" style="color: white; text-decoration: none; padding-right:4px;"><i class="far fa-user" style="color: white;"></i><span></span></a>-->
                            <a href="{{ url('/cart')}}" style="color: white; text-decoration: none; font-size:28px; "><span><i class="fa fa-shopping-cart" style="color: white;"></i></span></a>
                            <div class="counter"><span id="mc">{{count($cartitems)}}</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="get" action="{{ url('/search')}}">
                            <div class="control-group">
                                <input class="search-field" name="searchkeyword" placeholder="Search here...">
                                <button type="submit" class="search-button"></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->
                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row" id="custom1">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    <div class="dropdown dropdown-cart" id="insertcart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count">{{count($cartitems)}}</span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign">Rs</span><span class="value"> {{$cartitems->sum('cart_total')}}</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li >
                                @if(!empty($cartitems))
                                    @forelse($cartitems as $item)
                                        <div class="cart-item product-summary">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="image"> <a href=""><img src="@if(!empty($item->ProdImg->location)){{Config::get('backend_url')}}/{{$item->ProdImg->location}}/{{$item->ProdImg->file_name}}@endif" alt=""></a> </div>
                                                </div>
                                                <div class="col-xs-7">
                                                    <h3 class="name">
                                                        <a>
                                                            {{$item->product_title}} {!! $item->options ? '
                                             <div>('.$item->options.')</div>
                                             ' : 0 !!}
                                                        </a>
                                                    </h3>
                                                    <div class="price">Rs{{$item->cart_total}}</div>
                                                </div>
                                                <div class="col-xs-1 action">
                                                    <a href="{{ url('removecart/'.$item->id) }}" class="remove" aria-label="Remove this item" data-product_id="134" data-product_sku=""><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                        @endif
                                                <!-- /.cart-item -->
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="clearfix cart-total">
                                            <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>Rs{{$cartitems->sum('cart_total')}}</span> </div>
                                            <div class="clearfix"></div>
                                            <a href="{{ url('/cart')}}" class="btn color1 m-t-20" style="width: 48%">Cart</a>
                                            <a href="{{  url('/checkout')}}" class="btn color2 m-t-20" style="width: 48%">Checkout</a>
                                        </div>
                                        <!-- /.cart-total-->
                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->
                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3" id="custom1">
                    <ul style="list-style: none; display: inline-block; margin-top: 15px;">
                        <li style="list-style: none; display: inline-block; font-size:18px;"><a href="{{ url('/user-area') }}" style="color: white;"><i class="icon far fa-user" style="padding: 5px;" ></i>My Account</a></li>
                        <li style="list-style: none; display: inline-block; font-size:18px;"><a id="addtowishlist" href="{{ url('/wishlist-view') }}" style="color: white;"><i class="icon far fa-heart" style="padding: 5px;"></i>Wishlist</a></li>
                    </ul>
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- /.main-header -->
        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown" id="custom1" style="margin-top: 4px">
            <div class="container-fluid">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                <div class="col-md-10 col-md-offset-1">
                                    <ul class="nav navbar-nav">
                                        @forelse($navs as $nav)
                                            @if(count($nav->Subcats) >= 1)
                                                <li class="dropdown yamm mega-menu">
                                                    <a href="{{url('/category')}}/{{strtolower($nav->slug)}}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                                        {{$nav->name}}
                                                        <svg width="4.7" height="8" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="dropdownarrow">
                                                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="black" class="_3Der3h"></path>
                                                        </svg>
                                                    </a>
                                                    <ul class="dropdown-menu container">
                                                        <li>
                                                            <div class="yamm-content ">
                                                                <div class="row">
                                                                    @forelse($nav->Subcats as $level1)
                                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                            <h2 class="title"><a href="{{url('/category')}}/{{strtolower($level1->slug)}}"> {{$level1->name}}</a></h2>
                                                                            <ul class="links">
                                                                                @forelse($level1->SubcatsChild as $level2)
                                                                                    <li><a href="{{url('/category')}}/{{strtolower($level2->slug)}}">{{$level2->name}}</a></li>
                                                                                @empty
                                                                                @endforelse
                                                                            </ul>
                                                                        </div>
                                                                        @empty
                                                                        @endforelse
                                                                                <!-- /.col -->
                                                                        @if(count($nav->Subcats) >= 1)
                                                                            <div class="col-sm-6 col-md-5 col-menu banner-image xs-hidden"> <img class="img-resp onsive" src="@if(!empty($nav->catimg)){{env('BACKEND_URL')}}/public/assets/products/catimages/{{$nav->catimg}}@endif" alt="" style="width: 100%; padding-bottom: 25px;"> </div>
                                                                            @endif
                                                                                    <!-- /.yamm-content -->
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="dropdown hidden-sm"> <a href="{{ url('/category/')}}/{{strtolower($nav->slug)}}">{{$nav->name}}</a> </li>
                                            @endif
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div>
                            <!-- /.nav-outer -->
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.nav-bg-class -->
                </div>
                <!-- /.navbar-default -->
            </div>
            <!-- /.container-class -->
        </div>
        <!-- /.header-nav -->
        <!-- ============================================== NAVBAR : END ============================================== -->
    </div>

    <button type="button" id="mainmmenu" class="drawer-toggle drawer-hamburger hidden-md hidden-lg visible-sm-block visible-xs-block">
        <span class="drawer-hamburger-icon"></span>
    </button>
    {{-- Mobile menu --}}
    @include(Config::get('theme').'.pages.mmenu')
    {{-- Mobile menu --}}
</header>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<!--=============== Start of the Top most banners ===============-->
@yield('content')
        <!-- /.row -->
</div>
</div>
<!-- /#top-banner-and-menu -->
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <!-- /.module-heading -->
                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>Fsd, Pakistan.</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>03017002929</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">info@homes-inn.com</a></span> </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Quick Links</h4>
                    </div>
                    <!-- /.module-heading -->
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{ url('/')}}" title="Home Page">Home</a></li>
                            <li><a href="{{ url('/about-us')}}" title="About us">About</a></li>
                            <li><a href="{{ url('/cart')}}" title="cart page">Cart</a></li>
                            <li><a href="#!" id="addtowishlist" title="wishlist">Wishlist</a></li>
                            <li class="last"><a href="{{ url('/contact')}}" title="Where is my order?">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div>
                    <!-- /.module-heading -->
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="{{ url('/privacy-policy')}}">Privacy Policy</a></li>
                            <li><a title="Information" href="{{ url('/terms')}}">Terms & Conditions</a></li>
                            <li><a title="Addresses" href="{{url('/return-policy')}}">Return Policy</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">SUBSCRIBE TO OUR NEWSLETTER</h4>
                    </div>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email address"><br>
                    <button type="button" id="submitnewsletter" class=" btn form-control" value="SUBSCRIBE" style="background-color:#ff6700; color:white;font-weight: bold">SUBSCRIBE</button>
                    <span id="newslettermsg" style="color:white; font-weight:bold; font-size:15px;"></span>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="https://web.facebook.com/Store.Rang/" title="Facebook"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{asset('public/'.Config::get('theme').'/assets/images/payments/1.png')}}" alt=""></li>
                        <li><img src="{{asset('public/'.Config::get('theme').'/assets/images/payments/2.png')}}" alt=""></li>
                        <li><img src="{{asset('public/'.Config::get('theme').'/assets/images/payments/3.png')}}" alt=""></li>
                        <li><img src="{{asset('public/'.Config::get('theme').'/assets/images/payments/4.png')}}" alt=""></li>
                        <li><img src="{{asset('public/'.Config::get('theme').'/assets/images/payments/5.png')}}" alt=""></li>
                    </ul>
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->
<!-- For demo purposes – can be removed on production -->
<!-- For demo purposes – can be removed on production : End -->
<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/echo.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/'.Config::get('theme').'/assets/js/lightbox.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/wow.min.js')}}"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.js"></script>
<script src="{{ asset('public/'.Config::get('theme').'/assets/drawer/drawer.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script><script>
    $(document).ready(function() {
      $('.drawer').drawer();
    });
  </script>

<script type="text/javascript">
    echo.init({
        offset: 100,
        throttle: 250,
        unload: false,
        callback: function (element, op) {
            //console.log(element, 'has been', op + 'ed')
        }
    });

    $(window).scroll(function(){
        var sticky = $('.sticky'),
                scroll = $(window).scrollTop();

        if (scroll >= 1) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
    });

    // Custom Side Navigation

    function openNav() {
        document.getElementById("mySidenav").style.left = "0";
        document.getElementById("mySidenav").style.opacity = "1";
        document.getElementById("fiancy").style.width = "100%";

    }
    function closeNav() {
        document.getElementById("mySidenav").style.left = "-100%";
        document.getElementById("mySidenav").style.opacity = "0";
        document.getElementById("fiancy").style.width = "0%";

    }
    // Onscroll Mobile Sticky Header
    var wrap = $("#mwrap");

    wrap.on("scroll", function(e) {

        if (this.scrollTop > 147) {
            wrap.addClass("fix-mheader");
            
        } else {
            wrap.removeClass("fix-mheader");
        }

    });

    $(document).ready(function(){
        $('.drawer').drawer();
        $('body').click(function(){
            if($('#mySidenav').css('left')== '0px'){
                //event.preventDefault();
                closeNav();
            }
        });
        $(window).scroll(function () {
            //   var top =  $(".goto-top");
            if ( 115 <= (     $(window).scrollTop() )) {
                $("#12345").addClass("fixed");
                $("#12345").removeClass("hide");
                //console.log($(window).height()+",,"+$(window).scrollTop())
                
            } else {

                $("#12345").removeClass("fixed");
                $("#12345").addClass("hide");

            }
        });
    });

</script>
<script>
    var csrf = $('meta[name="_token"]').attr('content');
    $("button#submitnewsletter").unbind('click').click(function(){
        var email = $("input#email").val();
        if(email == '') {$("span#newslettermsg").html("<i class='fa fa-times'></i> write your email first");}
        else{
            $.post("{{ url('/addsubscriber') }}",{_token:csrf, email:email}, function(data){
                if(data== 'yes') { $("span#newslettermsg").html("<i class='fa fa-check'></i> You are successfully added to a new Subscriber");}
                if(data == 'no') {$("span#newslettermsg").html("<i class='fa fa-times'></i> You are already our Subscriber");}
            });
        }
    });
</script>
<div id="wishalert"></div>
@stack('js')
</body>
</html>