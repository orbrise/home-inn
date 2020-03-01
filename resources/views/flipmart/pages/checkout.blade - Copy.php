@extends(Config::get('theme').'.layout.master')

@push('css')

@endpush

@section('content')
    <div class="body-content">
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">Home</a></li>
        <li class='active'>Checkout</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div id="content"> 
    
    <!--======= PAGES INNER =========-->
     @if(count($cartitems) >= 1)
    <section class="chart-page padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart2"> 
          
                    <!-- SHOPPING INFORMATION -->
    
   <!-- <ul>
      <li><span><i class="fas fa-phone"></i></span></li>
      <li><a href="#" class="btn color1 " style="color:white"><span>VIEW CART</span></a></li>
      <li>  <a href="#" class="btn color2" style="color:white"><span>PLACE ORDER</span></a></li>
    </ul>-->
           
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-7">
                <h6>BILLING DETAILS</h6>

                    <form method="post" action="{{ url('/submmitcheckout')}}">
                     {{ csrf_field()}}
                  <ul class="row" id="guestcheckout">
                   
                                        <!-- Name -->
                    <li class="col-md-12">
                      <label> *FULL NAME
                        <input type="text" name="first_name" value="{{old('first_name')}}" required >
                        @if($errors->first('first_name')) <br><span class="text-danger">{{$errors->first('first_name')}} </span> 
                        @endif
                      </label>


                    </li>
                    <!-- LAST NAME -->
                    
                    
                    <li class="col-md-12"> 
                      <!-- ADDRESS -->
                      <label>*ADDRESS
                        <input type="text" name="address" value="{{old('address')}}" required>
                        @if($errors->first('address')) <br><span class="text-danger">{{$errors->first('address')}} </span> 
                        @endif
                      </label>
                    </li>
                    <!-- TOWN/CITY -->
                    <li class="col-md-12">
                      <label>*TOWN/CITY
                        <input type="text" name="town" value="{{old('town')}}" required>
                        @if($errors->first('town')) <br><span class="text-danger">{{$errors->first('town')}} </span> 
                        @endif
                      </label>
                    </li>
                    
                    {{-- <!-- COUNTRY -->
                    <li class="col-md-6">
                      <label> COUNTRY
                        <input type="text" name="country" value="{{old('country')}}" >
                        @if($errors->first('country')) <br><span class="text-danger">{{$errors->first('country')}} </span> 
                        @endif
                      </label>
                    </li> --}}
                    
                    <!-- EMAIL ADDRESS -->
                    <li class="col-md-6">
                      <label> EMAIL ADDRESS
                        <input type="text" name="email" value="{{old('email')}}">
                        @if($errors->first('email')) <br><span class="text-danger">{{$errors->first('email')}} </span> 
                        @endif
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-6">
                      <label> *PHONE
                        <input type="text" name="phone" maxlength="12" minlength="12" value="{{old('phone')}}" id="phone" required>
                        @if($errors->first('phone')) <br><span class="text-danger">{{$errors->first('phone')}} </span>
                        @endif
                      </label>
                    </li>
                    
                    <!-- PHONE -->
                   
                  </ul>

                    <br>

                  <div class="stickyq">
                     <a href="{{ url('/cart')}}" class="btn color1 " style="color:white; width: 49%"><label
                                 class="inskew">View Cart</label></a>
                    
                    
                     <button type="submit" style="color:white; width: 49%" class="btn color2 pull-right"><label class="inskew">Place Order</label></button>
                  </div>

                
                
               
                
               
              </div>
              
              <!-- SUB TOTAL -->
              <div class="col-sm-5">
                <h6>YOUR ORDER</h6>
                <div class="order-place">
                  <div class="order-detail">
                     @if(!empty($cartitems))
                  @php $sum=0; @endphp
                    @foreach($cartitems as $citem)
                  <p>{{ str_limit($citem->product_title, $limit=40, $end='...')}} <span>Rs {{$citem->cart_total}} @php  $sum += $citem->cart_total @endphp</span></p>
                         @endforeach    
                    
                    <!-- SUB TOTAL -->
                    <p id="carttotal" data="{{$sum}}" class="all-total">TOTAL COST <span> Rs <span id="ct">{{$sum+$srate->normal_rates}}</span></span></p>
                    @endif
                  </div>
                  <div class="pay-meth">
                    <ul>
                      <li>
                        <div class="radio"> 
                          @if(!empty($rates))
                          @foreach($rates as $rate)
                          @if(!empty($rate->normal_rates))
                          <input type="radio" name="shipment" id="shipment" value="{{$rate->normal_rates}}" checked>
                          <label for="radio2"> Normal Delivery Rs {{$rate->normal_rates}}</label>
                          @endif
                          @if(!empty($rate->urgent_rates))
                          <input type="radio" name="shipment" id="shipment" value="{{$rate->urgent_rates}}">
                          <label for="radio2"> Urgent Delivery Rs {{$rate->urgent_rates}}</label>
                          @endif
                          @endforeach
                          @endif
                            </div>
         
                      </li>
                      <li>
                        <div class="radio">
                          <input type="radio" name="radio1" id="radio2" value="option2" checked="">
                          <label for="radio2"> CASH ON DELIVERY</label>
                        </div>
                      </li>
                      
                    
                      <li>
                        <div class="checkbox">
                          <input id="checkbox3-4" class="styled" type="checkbox" required="" checked="">
                          <label for="checkbox3-4"> I’VE READ AND ACCEPT THE <span class="color"> TERMS &amp; CONDITIONS </span> </label>
                        </div>
                      </li>
                    </ul>
                    <button type="submit" class=" hidesm btn color2 pull-right margin-top-30">PLACE ORDER</button> </div>
                </div>
              </div>
            </div>
          </div>
      </form>
              </div>
      </div>
    </section>
    @else
    <div style="padding:20px; margin-bottom:20px; "><h3 class="text-center">Your Cart is Empty!<br><br> <a href="{{ url('/')}}" class="btn btn-primary">Back to Shop</a></h3></div>
    @endif
   
  </div>
    </div>
@endsection


@push('js')

@endpush