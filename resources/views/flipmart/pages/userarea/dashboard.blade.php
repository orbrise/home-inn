@extends(Config::get('theme').'.layout.master')

@push('css')

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

<div id="" class="container">
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
                        <h4>Personal Information</h4>
                        <hr>
                    </div>
                </div>
                <div class="">
                    <div class="col-md-12">
                      @if(!empty(session('successmsg')))
                      <div class="alert alert-success" >{{ session('successmsg') }}</div>
                      @endif
                        <form method="post" action="{{  url('/userupdate')}}">
                          {{ csrf_field()}}
                          <input type="hidden" name="id" value="{{Auth::user()->id}}">
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Full Name*</label> 
                                <div class="col-8">
                                  <input id="fname" name="fname" value="{{Auth::user()->name}}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email*</label> 
                                <div class="col-8">
                                  <input id="email" name="email" value="{{Auth::user()->email}}" required="required" class="form-control here" type="text" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Address</label> 
                                <div class="col-8">
                                  <input id="address" name="address" value="{{Auth::user()->address}}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">City</label> 
                                <div class="col-8">
                                  <input id="city" name="city" value="{{Auth::user()->city}}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">Country</label> 
                                <div class="col-8">
                                  <input id="country" name="country" value="{{Auth::user()->country}}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="pass" class="col-4 col-form-label">Phone</label> 
                                <div class="col-8">
                                  <input id="phone" name="phone" value="{{Auth::user()->phone}}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                               
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-small">Update </button>
                                </div>
                              </div>
                            </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
  </div>
    
   
  </div>

    </div>
@endsection


@push('js')

@include(Config::get('theme').'.ajax.script');
@endpush