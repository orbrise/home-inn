@extends(Config::get('theme').'.layout.master')

@push('css')
<style>table, tr, td{border:0px !important;}</style>
@endpush


@section('content')
    <div class="body-content">

        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class=''>User Dashboard</li>
                    </ul>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.breadcrumb -->


        <div class="container">
     <div class="row">
    <div class="col-md-3 ">
         <div class="list-group ">
              @include(Config::get('theme').'/pages/userarea/sidebarnav')
              
            </div> 
    </div>

    <div class="col-md-9">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>My Wishlist</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      @if(!empty(session('successmsg'))) <div class="alert alert-success">
                      {{session('successmsg') }}</div> @endif
                     <div class="papular-block">
          
          <!-- Item -->
          @if(!empty($wishlists))
          <table class="table">
          @foreach($wishlists as $wishlist)
         
           <tr>
             <td><img src="{{Config::get('backend_url')}}/{{$wishlist->prodimg->location}}{{$wishlist->prodimg->file_name}}" width="150" class="img">
             </td>
             <td style="text-align: left">
              <h5>{{$wishlist->Prodinfo->title}}</h5>
              <p>{{$wishlist->Prodinfo->short_desc}}</p>
              <p><b>Rs. {{$wishlist->Prodinfo->r_price}}</b> |
                <a href="{{ url('removewishlist')}}/{{$wishlist->id}}" ><i class="fa fa-times"></i> Remove From List</a></p>

            </td>
           </tr>
         
        @endforeach
        </table>
        @endif

                    </div>
                </div>
                
            </div>
        </div>
  </div>
</div><br><br>

  </div>
</div>
    
    </div>

@endsection


@push('js')

@include(Config::get('theme').'.ajax.script');
@endpush