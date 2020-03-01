@extends(Config::get('theme').'.layout.master')

@push('css')

@endpush


@section('content')

<div id="content"> 
    
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
      <div class="container"> 

      <div align="center">
      	@if($error == 1)
        <div class="jumbotron">
  <h1 class="display-4" style="color:green">Session Expired!!</h1>
  <hr class="my-4">
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ url('/')}}" role="button">Home Page</a> <a class="btn btn-primary btn-lg" href="{{ url('/store/catogries')}}" role="button">Continue Shopping</a>
  </p>
</div>
        @else
      	<div align="center"><img src="{{url('public/'.Config::get('theme').'/images/success.gif')}}" width="400"></div>

      	<div class="jumbotron">
  <h1 class="display-4" style="color:green">Congractulation!!</h1>
  <p class="lead">Your account is activated, you can now login.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ url('/')}}" role="button">Home Page</a> <a class="btn btn-primary btn-lg" href="{{ url('/login')}}" role="button">Login</a>
  </p>
</div>
@endif

      </div>
      	</div>
      </section>
  </div>

@endsection

@push('js')

@endpush