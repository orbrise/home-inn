@extends(Config::get('theme').'.layout.master')

@push('css')

@endpush

@section('content')

<div class="container-fluid body-content ksm" style="margin-left:20px; margin-right: 20px;">
	
			<!--product detail starts-->
      @if(count($cartitems) >=1 )
			<div class="row ksm" style="margin:  10px">

<!--left bar-->
				<div class="col-md-8 cart-detail">
					<div class="row">
					<div class="header hidelgcolor">
						<label>MY CART({{count($cartitems)}})</label>
						
					</div>
					</div>
					<hr style="margin-top: 0px; margin-bottom: 10px; ">
          @forelse($cartitems as $cartitem)
					<div class="row m-b-20">
						<div class="col-md-3 col-sm-4 col-xs-4 smk">
							<div class="outer1">
								<img src="@if(!empty($cartitem->ProdImg->location)){{env('BACKEND_URL')}}/{{$cartitem->ProdImg->location}}/{{$cartitem->ProdImg->file_name}}@endif">

               
                
                    <label class="hide-md">Quantity</label>
                   <input type="number" id="cartqty" data="{{$cartitem->id}}" value="{{$cartitem->product_qty}}" min="1" class="form-control hide-md" style="padding:5px; text-align: center;">
               
						

            	</div>
							
						</div>
						<div class="col-md-9 col-sm-8 col-xs-8 product-detail">
							<label class="f-17"><a href="#">
								{{$cartitem->product_title}}
								@if($cartitem->options !== '')
								<small class="text-muted">({{$cartitem->options}})</small>
								@endif
						</a></label>
							<h4>
							<small>Brand: @if(!empty($cartitem->GetBrand->brand)) $cartitem->GetBrand->brand @else Rang.pk @endif</small><br>
              <small>Qty: {{$cartitem->product_qty}}</small>
							</h4>
							
							<h4>
								RS: <span id="priceupdate{{$cartitem->id}}">{{$cartitem->cart_total}}</span>
							</h4>
							
						</div>
					</div>

					<div class="row" style="padding: 5px;">
						<div class="col-md-3 col-sm-4">
							<div class="quantity hidesm">
								
								<input type="number" id="cartqty" data="{{$cartitem->id}}" value="{{$cartitem->product_qty}}" min="1" class="form" style="width: 100px; padding:5px; text-align: center;">
								
							</div>
						</div>
            <div class="col-md-9 col-sm-8">
						<span>
							<h4>
							<a href="{{ url('/removecart')}}/{{$cartitem->id}}" ><i class="fa fa-times-circle" style="color:red"></i> Remove</a></h4>
						</span>
          </div>
					</div>
          <!--second product-->
          <hr style="margin-top: 0px; margin-bottom: 10px; ">

          @empty
          @endforelse
        





<div class="row hidesm" id="cart-footer">
<div class="pull-right">
    <a href="{{ url('/')}}" class="btn-primary btn-lg bsm color1" id="continueshop"><span><i class="fa fa-angle-left"></i> </span> CONTINUE SHOPPING</a>
   
   <a href="@if(count($cartitems) >=1 ){{url('/checkout')}} @else #! @endif" class="btn-primary btn-lg bsm color2" id="place">CHECKOUT</a>

</div>
</div>

									</div>


<!--right bar-->
				<div class="col-md-4 cart-detail hidesm" id="cartinfo" style="margin-left: 30px; width: 30%; font-weight: 600;">
    <div style="padding-left: 10px;">
					<label class="f-16">PRICE DETAILS</label>
					<hr style="margin-top: 0px;margin-bottom: 10px;">
    					<div class="fk">
    						Price({{count($cartitems)}}-Items):
    						<span class="f-r">Rs: {{$cartitems->sum('cart_total')}}</span>
    					</div>
    					<div class="fk" style="margin-top: 5px; margin-bottom: -5px;">
    						Delivery Charges:
    						<span class="f-r">{{$srate->normal_rates}}</span>
    					</div>
              <hr style="width: 100%; border-top: 1px dotted grey;">
    					<div style="font-size: 15px; margin-top: 10px;">
    						Amount Payable:
    						<span class="f-r"><b>Rs: {{$cartitems->sum('cart_total')+$srate->normal_rates}}</b></span>
    					</div>
    					<hr style="margin-top: 15px; margin-bottom: 10px;">
    					<div class="f-17" style="margin-top: 10px; margin-bottom: 10px;">
    						
    					</div>
				</div>
      </div>
			</div>
      <div class="row stickyq hide-md">

      <div class="col-xs-12">
        <a href="{{ url('/')}}" class="btn color1" style="color:white"><label class="inskew">CONTINUE SHOPPING</label></a>
        <a href="@if(count($cartitems) >=1 ){{url('/checkout')}} @else #! @endif" class="btn color2" style="color:white"><label class="inskew">CHECKOUT</label></a>
      </div>
    </div>
      @else
<div class="row ksm" style="margin:  10px">

<!--left bar-->
        <div class="col-md-12 cart-detail">
          <div class="row">
          <div class="header hidelgcolor">
      <h3 class="text-center">Cart is Empty!</h3>
      <br>
      <div align="center">
      <a href="{{ url('/')}}" class="btn btn-warning btn-lg">Back to Shop</a>
    </div>
    </div>
  </div>
</div>
</div>

      @endif
      @endsection

      @push('js')
@include(Config::get('theme').'.ajax.script')
      @endpush