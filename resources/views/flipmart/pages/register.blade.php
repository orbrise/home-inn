@extends(Config::get('theme').'.layout.master')

@push('css')

@endpush


@section('content')
<div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart2">
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-8 col-sm-offset-2">
                <h6>REGISTER NEW ACCOUNT</h6>
                @if(!empty(session('successmsg')))
                <div class="alert alert-success">{{ session('successmsg')}}</div>
                @endif
                <form method="post" action="{{ url('/registercustomer')}}">
                          {{ csrf_field() }}
                  <ul class="row">
                    
                    <!-- Name -->
                    <li class="col-md-12">
                      <label> FULL NAME
                        <input type="text" name="fname" value="{{ old('fname')}}" placeholder="">
                        @if(!empty($errors->first('fname')))<br><span class="text-danger">{{$errors->first('fname')}}</span>@endif
                      </label>
                    </li>

                    <li class="col-md-12">
                      <label> EMAIL
                        <input type="text" name="email" value="{{old('email')}}" placeholder="">
                        @if(!empty($errors->first('email')))<br><span class="text-danger">{{$errors->first('email')}}</span>@endif
                      </label>
                    </li>
                    <!-- LAST NAME -->
                    <li class="col-md-12">
                      <label> PASSWORD
                        <input type="password" name="password" value="" placeholder="">
                        @if(!empty($errors->first('password')))<br><span class="text-danger">{{$errors->first('password')}}</span>@endif
                      </label>
                    </li>

                    <li class="col-md-12">
                      <label> REPEAT PASSWORD
                        <input type="password" name="rpassword" value="" placeholder="">
                        @if(!empty($errors->first('rpassword')))<br><span class="text-danger">{{$errors->first('rpassword')}}</span>@endif
                      </label>
                    </li>
                    
                    <!-- LOGIN -->
                    <li class="col-md-4">
                      <button type="submit" class="btn color1">Register</button>
                    </li>
                    
                    
                  </ul>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
   
  </div>

@endsection


@push('js')

@include(Config::get('theme').'.ajax.script');
@endpush