@extends(Config::get('theme').'.layout.master')

@push('css')

@endpush

@section('content')
<div class="body-content">
<div id="top-banner-and-menu">
  <div class="container-fluid">
   
    <div class="row"> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 homebanner-holder p-x-0">
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div class="row">
          <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            <div class="item" style="background-image: url({{ asset('public/'.Config::get('theme').'/assets/images/sliders/02.jpg')}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-center">
                  <div class="slider-header fadeInDown-1"><span style="color:white;">Best Quality</span></div>
                  <div class="big-text fadeInDown-1"><span style="color:white;"> Bridal Bedsets</span> </div>
                  <div class="excerpt fadeInDown-2 hidden-xs">  </div>
                  <div class="button-holder fadeInDown-3"> <a href="https://homes-inn.com/product/beautiful-bridal-bedset" target="blank" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            <div class="item" style="background-image: url({{ asset('public/'.Config::get('theme').'/assets/images/sliders/01.jpg')}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"><span style="color:white;">Jayourd Quilted</span></div>
                  <div class="big-text fadeInDown-1"> <span style="color:white;">Cover Protector</span> <span class="highlight"></span> </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> </div>
                  <div class="button-holder fadeInDown-3"> <a href="https://homes-inn.com/product/jaycourd-sofa-protector" target="blank" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            <div class="item" style="background-image: url({{ asset('public/'.Config::get('theme').'/assets/images/sliders/03.jpg')}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"><span style="color:white;">2 Pc</span></div>
                  <div class="big-text fadeInDown-1"> <span style="color:white;">Nishat Lawn</span> <span class="highlight"></span> </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> </div>
                  <div class="button-holder fadeInDown-3"> <a href="https://homes-inn.com/product/nishat-lawn-collection-2pc" target="blank" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
             <div class="item" style="background-image: url({{ asset('public/'.Config::get('theme').'/assets/images/sliders/04.jpg')}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"><span style="color:black;">Fitted Sheet</span></div>
                  <div class="big-text fadeInDown-1"> <span style="color:black;">Waterproof Mattress Cover</span> <span class="highlight"></span> </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> </div>
                  <div class="button-holder fadeInDown-3"> <a href="https://homes-inn.com/product/100-waterproof-mattress-cover" target="blank" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
          </div>
          <!-- /.owl-carousel --> 
        </div>
        </div>


</div>
</div>
</div>
</div>

  <div class="m-t-15"></div>

<div class="topmostbanner  hidden-xs">
  <div class="container-fluid">
	<div class="row" >
<!--====================Banner changes start================-->


     <div class="col-md-4 col-xs-6 col1 p-l-0">
      <div class="row banner-row height">
    <a href="https://homes-inn.com/product/100-waterproof-mattress-cover" target="blank"><img class="img img-responsive" src="{{asset('public/flipmart/assets/images/banners/waterproof.jpg')}}"></a>
      </div>
    </div>
 <div class="col-md-4 col-xs-6 col2">
      <div class="row banner-row height">
        <a href="https://homes-inn.com/product/imported-anklet-slipers" target="blank"><img class="img img-responsive" src="{{ asset('public/flipmart/assets/images/banners/ankletslipers.jpg')}}"></a>
    </div>
    </div>

    <div class="col-md-4 col-xs-6 col2">
 <div class="row banner-row height">
        <a href="https://homes-inn.com/product/maria-blawn-collection-3pc" target="blank"><img class="img img-responsive" src="{{ asset('public/flipmart/assets/images/banners/lawn.jpg')}}"></a>
    </div>
    </div>
    
  </div>
    <!--=====================banner changes end================--->
</div>
</div>


				<!--====================== End of the top most banners ==================-->
  



  <div class="container-fluid">
    <div class="row"> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 homebanner-holder p-x-0">
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs m-t-10 wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Arrivals</h3>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="6">
                  
                  @forelse($newprods as $key => $nallprod)
                  @php $rand = rand(0,5) @endphp
                  <div class="item item-carousel">
                    <div class="products">
                      @ProductGrid(['prod' => $nallprod])
                      @endProductGrid
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  @empty
                  @endforelse
                  <!-- /.item -->
                           
                  <!-- /.item --> 
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
           
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== 
        <div class="wide-banners wow fadeInUp">
          <div class="row">
            <div class="col-md-12 col-sm-12 firstbanner">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('public/'.Config::get('theme').'/assets/images/banners/sofabanner.jpg')}}" alt=""> </div>
              </div>
             
            </div>
          
 
            
          </div>
         
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp featurepro m-t-10">
          <h3 class="section-title">Bridal Bedding</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" >
           @forelse($homeliving as $hl)
           @php $rand1 = rand(0,5) @endphp
            <div class="item item-carousel">
              <div class="products">
                @ProductGrid(['prod' => $hl])
                @endProductGrid
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            @empty
            @endforelse
                       
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->
        
        <!-- /.section --> 
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        <!--=============== Start of the Top most banners ===============-->

<!--====================== End of the top most banners ==================-->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">Latest Lawn Collections</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme m-t-10" id="newarrivals">
          	@forelse($sofacovers as $scover)
             
            <div class="item item-carousel">
              <div class="products">
                @ProductGrid(['prod' => $scover])
                @endProductGrid
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            @empty
            @endforelse
          
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">Sofa Collections</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme m-t-10" id="newarrivals">
          	@forelse($sofarunners as $sofar)
             @php $rand2 = rand(0,5) @endphp
            <div class="item item-carousel">
              <div class="products">
                @ProductGrid(['prod' => $sofar])
                @endProductGrid
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            @empty
            @endforelse
          
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
<!--
        <div class="wide-banners wow fadeInUp m-t-10">
          <div class="row">
            <div class="col-md-12 col-sm-12 firstbanner">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('public/'.Config::get('theme').'/assets/images/banners/bridalset.jpg')}}" alt=""> </div>
              </div>
              
            </div>
           
 
            
          </div>
          
        </div>
-->

        <section class="section wow fadeInUp new-arriavls m-t-10">
          <h3 class="section-title">Kids Clothing</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" id="newarrivals">
          	@forelse($curtains as $curtain)
             @php $rand3 = rand(0,5) @endphp
            <div class="item item-carousel">
              <div class="products">
                @ProductGrid(['prod' => $curtain])
                @endProductGrid
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            @empty
            @endforelse
          
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>

        <section class="section">
          <div class="panel">
            <div class="panel-body">
                <h1>ABOUT HOMES INN</h1>
            <p><b>Can’t find your required products on ecommerce stores? Do you feel scammed when the
delivered product is entirely different from what you saw?</b></p>
<p>Then it’s time we introduce you to a new and <b>amazingly cool online shopping experience.</b>
Now there’s no need for you to browse several sites to find your required product. <a href="https://homes-inn.com">Homes INN</a> is
the platform where you can find your required item in no time! We at Homes In, aim to provide
you the best online shopping experience. We have exclusive range of products from all the
major brands in Pakistan. Our ability to always provide our customers with only high quality
products is what makes us different from the rest.</p>
<p>Here at <a href="https://homes-inn.com">Homes INN</a>, we have experts which read the market trends in order to update our
collection of products, so that you don’t feel left behind. If you’re looking for a smooth online
shopping experience, then Homes In is the best option that you’ve got.
What we offer to ensure your smooth online shopping experience.</p>
<p><a href="https://homes-inn.com/category/women">Women</a>, who always take pride in being the symbol of beauty and elegance, always look for the
best clothes and accessories to make their beauty shine brighter. We at <a href="https://homes-inn.com">Homes INN</a> are well
aware of this fact and that’s why we have the most exclusive and stylish collection of clothing
and accessories for Women. As women are more brands conscious, we have gathered all the
major clothing and makeup brands at one platform. Now, if you need anything from Makeover
products to Clothing, Stylish Shoes to Branded Accessories, <a href="https://homes-inn.com">Homes INN</a> is the best choice for you.
<a href="https://homes-inn.com/category/men">Men</a>: As we are well aware that Men are also quite style conscious today and are not willing to
compromise on their looks and attire at all. If you are also a style conscious male who wants to
look cool and more elegant then don’t worry because we’ve got you covered. We have a wide
range of products for Men. We have the best collection of Men attire from most famous and
prestigious brands of clothing in Pakistan. Not only this, we’ve also got some of the finest Men
Accessories and Footwear collection as well.</p>
<p><a href="https://homes-inn.com/category/bridal-bedding">Bridal bedsets</a> are one of the most important things that a mother secures for her daughter’s
dowry. At Homes In we have most fabulous collection of Bridal Bedsheets. Our bridal bedsheets
are made with high quality fabric and are neatly stitched, because we know what it means for
you to purchase a bridal bedsheet for your loved one.</p>
<p>In addition to the above categories we also have a wide range of <a href="https://homes-inn.com/category/sofa-runners">Sofa protectors</a> and
<a href="https://homes-inn.com/category/waterproof-covers">Waterproof Covers</a>. The fact that women like to protect furniture is well known. That’s why we
have high quality sofa protectors that protect your sofas form damage. Also we you are sick of
kids spilling drinks on your beds and sofas then we have waterproof covers which are designed
to keep water away from the surface of your furniture.</p>

<h1>Why Choose Us?</h1>

<p>No scam!</p>
<p>We know that most of the people despise online shopping just because the product they get
after paying their hard earned money is quite different than what they saw on screen. That’s
why we have introduced the “No scam!” policy in online shopping in Pakistan. Our customers
are always the top priority for us. That’s why we never compromise on product quality. Because
we believe that you should receive what you paid for!</p>
<h1>Best Service.</h1>
<p>We know that people come to the online shopping stores because they expect the best service
and a smooth shopping experience. And that is why we work 24/7 to provide you with the best
online shopping experience.</p>
<h1>One of the best Customer Support teams</h1>
<p>We at <a href="https://homes-inn.com">Homes INN</a> take pride in having one of the best customer support teams. Our highly
trained support team is always there to assist you with your shopping. Our team makes sure to
help you in any possible way just to make you feel at home and make your shopping experience
sweeter.</p>
<h1>Exclusiveness</h1>
<p>In this age where exclusivity is everything, we make sure to provide our customers with
exclusive products in the market. Because we can’t let our customers be left behind in this age
of fashion.</p>

<h1>Making an order was never this easy!</h1>

<p>Forget the complex methods of ordering products online. Now <a href="https://homes-inn.com">Homes INN</a> has made online
shopping very simple. You just need to make an account at <a href="https://homes-inn.com">Homes INN</a> first. After making an
account, you can browse through thousands and thousands of exclusive products from all over
Pakistan.</p>
<p>The moment you find the product you’ve been looking for, just click on the “add to cart”
button. After that you just have to choose a payment method and that’s it. That’s how simple
making an order is with <a href="https://homes-inn.com">Homes INN</a>.</p>

<p>We make sure to that your product is delivered in the mentioned time so that you don’t have to
through unnecessary waiting.</p>
<p>That’s why Homes In should be your number one choice whenever you decide to buy a product
online. Because we know what you need and we work hard to give you only the best!</p>    
            </div>
          </div>
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>

  </div>
@endsection

@push('js')
@include(Config::get('theme').'.ajax.script')
@endpush