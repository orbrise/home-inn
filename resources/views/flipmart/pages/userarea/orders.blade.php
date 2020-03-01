@extends(Config::get('theme').'.layout.master')

@push('css')
<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                        <h4>My Orders</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                     <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
      <th class="th-sm">Sr #
      </th>
      <th class="th-sm">Order No
      </th>
      <th class="th-sm">Created Date
      </th>
      <th class="th-sm">No of Items
      </th>
      <th class="th-sm">Total Amount
      </th>
      <th class="th-sm">Status</th>
      <th class="th-sm">Action
      </th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($orders))
    @forelse ($orders as $key => $order)
    <tr>
      <td>{{$key+1}}</td>
      <td>#{{$order->order_no}}</td>
      <td>{{date('d M Y',strtotime($order->created_at))}}</td>
      <td class="text-center">{{count($order->countorders)}}</td>
      <td class="text-center">Rs. {{ $order->sumorders->sum('total') }}</td>
      <td class="text-center">
        @if($order->process_level == 1 ) <span class="label label-warning">Pending</span> @endif
         @if($order->process_level == 2 ) <span class="label label-info">Processed</span> @endif
         @if($order->process_level == 3 ) <span class="label label-info">Ready for Shipment</span> @endif
         @if($order->process_level == 4 ) <span class="label label-info">Delivered to Shipper</span> @endif
         @if($order->process_level == 5 ) <span class="label label-info">Delivered to Customer</span> @endif
      </td>
      <td class="text-center"><a href="{{ url('/orderview')}}/{{$order->order_no}}"><i class="fa fa-eye"></i></a></td>
    </tr>
    @empty
    @endforelse
    @endif

    </tbody>
    <tfoot>
    <tr>
     <th class="th-sm">Sr #
      </th>
      <th class="th-sm">Order No
      </th>
      <th class="th-sm">Created Date
      </th>
      <th class="th-sm">No of Items
      </th>
      <th class="th-sm">Total Amount
      </th>
      <th class="th-sm">Status</th>
      <th class="th-sm">Action
      </th>
    </tr>
    </tfoot>
    </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <br>

    </div>
    </div>
@endsection


@push('js')
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#dtBasicExample').DataTable();
} );
</script>
@include(Config::get('theme').'.ajax.script');
@endpush