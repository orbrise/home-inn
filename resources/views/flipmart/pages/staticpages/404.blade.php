@extends('flipmart.layout.master')


@section('content')

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
					<h1>404</h1>
					<div class="h4">We are sorry, the page you've requested is not available. </div>
					{{-- <form role="form" class="outer-top-vs outer-bottom-xs">
                        <input placeholder="Search" autocomplete="off">
                        <button class="  btn-default le-button">Go</button>
                    </form> --}}
					<a href="{{ url('/') }}"><i class="fa fa-home"></i> Go To Homepage</a>
				</div>
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection