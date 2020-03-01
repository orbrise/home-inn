@extends(Config::get('theme').'.layout.master')

@push('css')

@endpush


@section('content')
<div id="content"> 
    <section class="body-content">
      <div class="container">
        <div class="shopping-cart2">

          <!-- SHOPPING INFORMATION -->



          <div class="cart-ship-info">
            <div class="row">

              <!-- ESTIMATE SHIPPING & TAX -->
              <div class="col-sm-4 col-md-offset-4 col-xs-12">
                <h6 class="text-center mb-5">LOGIN YOUR ACCOUNT</h6>
                @if(!empty(session('errormsg')))
                  <div class="alert alert-danger">
                    {{session('errormsg') }}</div>
                @endif
                <form method="post" action="{{ url('/dologin1')}}">
                  {{ csrf_field() }}
                  <ul class="row" id="login" style="display: block;">
                    <li class="col-md-12">
                      <label> Username
                        <input type="text" name="username" value="" placeholder="">
                      </label>
                    </li>
                    <li class="col-md-12">
                      <label> Password
                        <input type="password" name="password" value="" placeholder="">
                      </label>

                    </li>
                    <li class="col-md-12">
                      <button type="submit" class="btn color1">Login</button>
                    </li>
                    <li class="col-md-12">
                      <label class="text-center">Not have account? <a class="btn btn-primary" href="{{ url('/register') }}">Register</a></label>
                    </li>
                  </ul>
                </form>

              </div>

              <!-- SUB TOTAL -->

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