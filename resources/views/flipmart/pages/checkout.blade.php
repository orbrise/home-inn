@extends(Config::get('theme').'.layout.master')

@push('css')

<style>
    @media only screen and (max-width: 768px) {
  .mob-h6 {
    margin-bottom: 20px !important;
    margin-top: 50px !important;
}
}
</style>
@endpush


@section('content')
<div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart2">
          
          @if(count($cartitems) == 0)
           <div class="text-center"><h3>Cart is empty!</h3> <a href="{{ url('store/catogries')}}" class="btn">Go back to store</a></div>
          @else
          <!-- SHOPPING INFORMATION -->
           
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-7">
                <h6>BILLING DETAILS</h6>

                @if(Auth::check())
                   

                <form method="post" action="{{ url('/submmitcheckout')}}">
                     {{ csrf_field()}}
                  <ul class="row">
                   
                                        <!-- Name -->
                    <li class="col-md-12">
                      <label> *FULL NAME
                        <input type="text" name="first_name" value="{{ Auth::user()->name}}" required >
                        @if($errors->first('first_name')) <br><span class="text-danger">{{$errors->first('first_name')}} </span> 
                        @endif
                      </label>


                    </li>
                    <!-- LAST NAME -->
                    
                    
                    <li class="col-md-12"> 
                      <!-- ADDRESS -->
                      <label>*ADDRESS
                        <input type="text" name="address" value="{{ Auth::user()->address}}" placeholder="" required>
                        @if($errors->first('address')) <br><span class="text-danger">{{$errors->first('address')}} </span> 
                        @endif
                      </label>
                    </li>
                    <!-- TOWN/CITY -->
                    <li class="col-md-12">
                      <label>*TOWN/CITY
                        <input type="text" name="town" value="{{ Auth::user()->city}}" placeholder="" required>
                        @if($errors->first('town')) <br><span class="text-danger">{{$errors->first('town')}} </span> 
                        @endif
                      </label>
                    </li>
                    
                    <!-- COUNTRY -->
                    {{--<li class="col-md-6">
                      <label> COUNTRY
                        <input type="text" name="country" value="{{ Auth::user()->country}}" placeholder="" >
                        @if($errors->first('country')) <br><span class="text-danger">{{$errors->first('country')}} </span> 
                        @endif
                      </label>
                    </li>--}}
                    
                    <!-- EMAIL ADDRESS -->
                    <li class="col-md-6">
                      <label> EMAIL ADDRESS
                        <input type="text" name="email" value="{{ Auth::user()->email}}" placeholder="" readonly>
                        @if($errors->first('email')) <br><span class="text-danger">{{$errors->first('email')}} </span> 
                        @endif
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-6">
                      <label> *PHONE
                        <input type="text" name="phone" value="{{ Auth::user()->phone}}" placeholder="" required>
                        @if($errors->first('phone')) <br><span class="text-danger">{{$errors->first('phone')}} </span> 
                        @endif
                      </label>
                    </li>
                    
                    <!-- PHONE -->
                      <div class="stickyq">
                          <a href="{{ url('/cart')}}" class="btn color1 " style="color:white; width: 49%"><div
                                      class="inskew">View Cart</div></a>


                          <button type="submit" style="color:white; width: 49%" class="btn color2 pull-right"><div class="inskew">Place Order</div></button>
                      </div>
                 
                  </ul>

                @else

                <div class="radio">
                          <input type="radio" name="type" id="type" value="login" >
                          <label for="type"> Login</label>
                        </div>
                        <div class="radio">
                          <input type="radio" name="type" id="type" value="guest" checked>
                          <label for="type"> Guest Checkout</label>
                        </div>
                        <form method="post" action="{{ url('/dologin')}}">
                          {{ csrf_field() }}
                        <ul class="row" id="login">
                          <li class="col-md-12">
                      <label> Username
                        <input type="text" name="username" value="{{old('username')}}" placeholder="" >
                      </label>
                    </li>
                     <li class="col-md-12">
                      <label> Password
                        <input type="password" name="password" value="{{old('password')}}" placeholder="" >
                      </label>
                    </li>
                    <li class="col-md-6">
                     <button type="submit" class="btn color1">Login</button>
                    </li>
                        </ul>
                      


 <form method="post" action="{{ url('/submmitcheckout')}}">
                     {{ csrf_field()}}
                  <ul class="row" id="guestcheckout">
                   
                                        <!-- Name -->
                    <li class="col-md-12">
                      <label> *FULL NAME
                        <input type="text" name="first_name" value="{{old('first-name')}}" required >
                        @if($errors->first('first_name')) <br><span class="text-danger">{{$errors->first('first_name')}} </span> 
                        @endif
                      </label>


                    </li>
                    <!-- LAST NAME -->
                    
                    
                    <li class="col-md-12"> 
                      <!-- ADDRESS -->
                      <label>*ADDRESS
                        <input type="text" name="address" value="{{old('address')}}" placeholder="" required>
                        @if($errors->first('address')) <br><span class="text-danger">{{$errors->first('address')}} </span> 
                        @endif
                      </label>
                    </li>
                    <!-- TOWN/CITY -->
                    <li class="col-md-12">
                      <label>*TOWN/CITY
                        <input type="text" name="town" value="{{old('town')}}" placeholder="" required>
                        @if($errors->first('town')) <br><span class="text-danger">{{$errors->first('town')}} </span> 
                        @endif
                      </label>
                    </li>
                    
                    <!-- COUNTRY -->
                   {{-- <li class="col-md-6">
                      <label> COUNTRY
                        <input type="text" name="country" value="{{old('country')}}" placeholder="" >
                        @if($errors->first('country')) <br><span class="text-danger">{{$errors->first('country')}} </span> 
                        @endif
                      </label>
                    </li>--}}
                    
                    <!-- EMAIL ADDRESS -->
                    <li class="col-md-6">
                      <label> EMAIL ADDRESS
                        <input type="text" name="email" value="{{old('email')}}"  >
                        @if($errors->first('email')) <br><span class="text-danger">{{$errors->first('email')}} </span> 
                        @endif
                      </label>
                    </li>
                    <!-- PHONE -->
                    <li class="col-md-6">
                      <label> *PHONE
                        <input type="text" name="phone" value="{{old('phone')}}" placeholder="" required>
                        @if($errors->first('phone')) <br><span class="text-danger">{{$errors->first('phone')}} </span> 
                        @endif
                      </label>
                    </li>
                    
                    <!-- PHONE -->
                      <div class="stickyq">
                          <a href="{{ url('/cart')}}" class="btn color1 " style="color:white; width: 49%"><div
                                      class="inskew">View Cart</div></a>

                          
                          <button type="submit" style="color:white; width: 49%" class="btn color2 pull-right"><div class="inskew">Place Order</div></button>
                      </div>
                
                  </ul>



                  @endif

                
               
                
               
              </div>
              
              <!-- SUB TOTAL -->
              <div class="col-sm-5">
                <h6 class="mob-h6">YOUR ORDER</h6>
                <div class="order-place">
                  <div class="order-detail">
                    @if(!empty($cartitems))
                	@php $sum=0; @endphp
                    @foreach($cartitems as $citem)
                  <p>{{ $citem->product_title}} <span>{{Config::get('currency')}}{{$citem->cart_total}} @php  $sum += $citem->cart_total @endphp</span></p>
                         @endforeach    
                    
                    <!-- SUB TOTAL -->
                    <p id="carttotal" data="{{$sum}}" class="all-total">TOTAL COST <span> {{Config::get('currency')}} <span id="ct">{{$sum+$srate->normal_rates}}</span></span></p>
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
                          <label for="shipment"> Normal Delivery {{Config::get('currency')}} {{$rate->normal_rates}}</label>
                          @endif
                          @if(!empty($rate->urgent_rates))
                          <input type="radio" name="shipment" id="shipment" value="{{$rate->urgent_rates}}">
                          <label for="radio2"> Urgent Delivery {{Config::get('currency')}} {{$rate->urgent_rates}}</label>
                          @endif
                          @endforeach
                          @endif
                        </div>
         
                      </li>
                      <li>
                        <div class="radio">
                          <input type="radio" name="radio1" id="radio2" value="option2" checked>
                          <label for="radio2"> CASH ON DELIVERY</label>
                        </div>
                      </li>
                      
                    
                      <li>
                        <div class="checkbox">
                          <input id="checkbox3-4" class="styled" type="checkbox" required checked>
                          <label for="checkbox3-4"> I’VE READ AND ACCEPT THE <span class="color"> TERMS & CONDITIONS </span> </label>
                        </div>
                      </li>
                    </ul>
                    <button type="submit"  class="btn color1 btn-dark pull-right margin-top-30">PLACE ORDER</button> </div>
                </div>
              </div>
            </div>
          </div>
      </form>
      @endif
        </div>
      </div>
    </section>
   
  </div>

@endsection


@push('js')
<script>
$("ul#login").hide();
$("ul#guestcheckout").show();
$("input#type").unbind('click').click(function(){
 var check = $(this).val();
 if(check == 'login'){$("ul#guestcheckout").hide(); $("ul#login").show();}
 if(check == 'guest'){$("ul#guestcheckout").show(); $("ul#login").hide();}
});

$('input#shipment').unbind('change').change(function(){

var total = parseInt($('p#carttotal').attr('data'));
if($(this).is(':checked'))
{
  var option = parseInt($(this).val());
}
$('span#ct').html(total+option);

});

</script>
@endpush