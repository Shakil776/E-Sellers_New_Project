@extends('admin.master')

@section('title')
	Manage Order
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			@if(Session::get('message'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('message') }}
	            </div>
            @endif
			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Manage Order</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Order Total</th>
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Order Status</th>
                                <th class="text-center">Payment Type</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @php($i=1)
                        @foreach($orders as $order)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>{{ date('j F Y', strtotime($order->created_at)) }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->payment_status }}</td>
                                
                                <td class="text-center">
                                    
                            <a class="btn btn-info btn-xs" target="_blank" href="{{ route('view-order-details', ['id'=>$order->id]) }}" title="View Order Details">
                                <span>View Order Details</span>
                            </a>
                        
                            <a class="btn btn-warning btn-xs" target="_blank" href="{{ route('view-order-invoice', ['id'=>$order->id]) }}" title="View Order Invoice">
                                <span>View Order Invoice</span>
                            </a>
                            
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

		 	</div>
		</div>
	</div>

@endsection