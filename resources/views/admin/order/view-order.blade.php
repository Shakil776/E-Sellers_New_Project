@extends('admin.master')

@section('title')
	View Order
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
		    		<h4 class="text-center text-success"> Order Details Info </h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">

                        <tr>
                            <th>Order No</th>
                            <td>{{ date('dmY', strtotime($order->created_at)).$order->id }}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{ $order->order_total }} TK.</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->order_status }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ date('j F Y', strtotime($order->created_at)) }}</td>
                        </tr>

                    </table>
                </div>

                <div class="panel-footer">
                    <h4 class="text-center"> Update Order Status </h4>
                    
                        <form class="form-horizontal" action="{{ route('update-order-status', ['id'=>$order->id]) }}" method="POST" style="display:block;margin:0 auto; width:50%;">
                            @csrf
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <select class="form-control" name="order_status" required="">
                                        <option value="Pending" @if($order->order_status == "Pending") selected @endif>Pending</option>
                                        <option value="Cancelled" @if($order->order_status == "Cancelled") selected @endif>Cancelled</option>
                                        <option value="In Process" @if($order->order_status == "In Process") selected @endif>In Process</option>
                                        <option value="Shipped" @if($order->order_status == "Shipped") selected @endif>Shipped</option>
                                        <option value="Delivered" @if($order->order_status == "Delivered") selected @endif>Delivered</option>
                                    </select>
                                </div>
                                <input type="submit" value="Update Status" class="btn btn-primary">
                            </div>
                        </form>
		    	</div>

		 	</div>
		</div>
	</div>

    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Customer Info for this Order</h4>
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">

                        @if (isset($customer->name) || isset($customer->mobile) || isset($customer->email) || isset($customer->address))
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $customer->name }}</td>
                            </tr>

                            <tr>
                                <th>Mobile Number</th>
                                <td>{{ $customer->mobile }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $customer->address }}</td>
                            </tr>
                        @endif
                        
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Shipping info for this Order</h4>
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">

                            <tr>
                                <th>Receiver Name</th>
                                <td>@if(!empty($shipping_address->shipping_name)){{ $shipping_address->shipping_name }}@endif</td>
                            </tr>
                            <tr>
                                <th>Receiver Email</th>
                                <td>@if(!empty($shipping_address->shipping_email)){{ $shipping_address->shipping_email }}@endif</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>@if(!empty($shipping_address->shipping_mobile)){{ $shipping_address->shipping_mobile }}@endif</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>@if(!empty($shipping_address->shipping_address)){{ $shipping_address->shipping_address }}@endif</td>
                            </tr>
                        
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Payment info for this Order</h4>
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">

                            <tr>
                                <th>Payment Type</th>
                                <td>{{ $payment->payment_type }}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{ $payment->payment_status }}</td>
                            </tr>

                    </table>
                </div>

                <div class="panel-footer">
                    <h4 class="text-center"> Update Payment Status </h4>
                    
                        <form class="form-horizontal" action="{{ route('update-payment-status', ['id'=>$payment->id]) }}" method="POST" style="display:block;margin:0 auto; width:50%;">
                            @csrf
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <select class="form-control" name="payment_status" required="">
                                        <option value="Pending" @if($payment->payment_status == "Pending") selected @endif>Pending</option>
                                        <option value="Paid" @if($payment->payment_status == "Paid") selected @endif>Paid</option>
                                    </select>
                                </div>
                                <input type="submit" value="Update Status" class="btn btn-primary">
                            </div>
                        </form>
                    
                   
		    	</div>

            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Product Info for this Order</h4>
                </div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Code</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php($i=1)

                            @foreach($orderDetails as $orderDetail)
                                <?php 
                                    foreach($product_details = $orderDetail['products'] as $item){
                                        $product_name = $product_details['product_name'];
                                        $product_price = $product_details['product_price'];
                                        $product_code = $product_details['product_code'];
                                    }
                                ?>

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $product_name }}</td>
                                        <td>{{ $product_price }}</td>
                                        <td>{{ $product_code }}</td>
                                        <td>{{ $orderDetail->quantity }}</td>
                                        <td>{{ $orderDetail->size }}</td>
                                        <td> {{ $orderDetail->color }}</td>
                                        <td>TK. {{ $product_price * $orderDetail->quantity }}</td>

                                    </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection