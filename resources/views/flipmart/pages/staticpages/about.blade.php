@extends(Config::get('theme').'.layout.master')

@push('css')

@endpush

@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>About</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<section class="history-block padding-top-100 padding-bottom-100" style="padding-top: 75px; padding-bottom: 100px;">
      <div class="container">
        <div class="row">
          <div class="col-xs-10 center-block">
            <div class="col-sm-9 center-block" align="center">
            	<h1 style="text-align: center; font-family: 'Open Sans', sans-serif; font-weight: 900; "> ABOUT US </h1>
              <p style="text-align:justify;font-family: 'Open Sans', sans-serif;; font-weight: 400; line-height: 26px; margin-top: 15px;
"> Get front row access to everything behind-the-scenes at rang.pk. Read about the exciting things we’re planning and fun stuff we’re doing, from adding cool brands on our store to creating memories with people.we are a young and vibrant company that aims to provide good quality  products across apparel , homeline and accessories.

Our mission is to provide the widest range of quality products and a higher satisfied customer shopping experience to regular customers that visit us on a daily basis. This has been made possible through our newly introduced and upgraded services and the very attractive price range we give for our products. </p>


            </div>
            
          </div>
        </div>
      </div>
    </section>
@endsection


@push('js')

@endpush