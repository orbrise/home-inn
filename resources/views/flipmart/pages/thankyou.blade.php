@extends(Config::get('theme').'.layout.master')

@push('css')

@endpush

@section('content')

<div id="content" class="body-content" style="padding: 20px"> 
    
    <!--======= PAGES INNER =========-->
    <div class="container outer thank" style="max-width: 800px">
   <center> <img src="{{asset('public/'.Config::get('theme').'/assets/images/tick.png')}}" width="200"></center>
   
   
     
       <center><h1 style="color:#00af00; font-weight: bold">CONGRATULATIONS</h1>
       <h4>Your Order Has Been Placed. A Confirmation Mail Has Been Sent TO Your Given E-mail Address,Shortly Our Autorised Person Will Contack You</h4>
       <hr>
       <div class="row">

    <a href="{{ url('/')}}" class="btn-primary btn-lg bsm color1" id="continueshop"><span><i class="fa fa-angle-left"></i> </span> CONTINUE SHOPPING</a>

    </div>
</center>

    <div class="row">
        <div class="panel">
            <div class="panelbody">
                    <h2>Order Details ( #{{$orderid}} )</h2>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr  class="info">
                          <th>Product Name</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach($cartitems as $item)
                        <tr>
                          <td>{{ $item->product_name }}  {!! $item->attr_name ? '<small>('.$item->attr_name.')</small>' : 0 !!} x {{ $item->qty }} </td>
                          <td>Rs. {{ $item->price*$item->qty }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr  class="">
                              <th>Delivery Charges</th>
                              <th>{{ $cartitems[0]->delivery_charges}}</th>
                            </tr>
                            <tr  class="info">
                              <th>Sub-Total</th>
                              <th>{{ $cartitems->sum('total')+$cartitems[0]->delivery_charges}}</th>
                            </tr>
                          </tfoot>
                    </table>
            </div>
        </div>
    </div>
    
   </div>
    
   
  </div>
<style>
    tr.info th {
        background-color: #2874f0 !important;
        color: #fff;
        border-color: #2874f0 !important;
        border-top-color: #2874f0 !important;
    }
    .table {
        border-top: #2874f0;
    }
</style>
  @endsection


@push('js')

@endpush