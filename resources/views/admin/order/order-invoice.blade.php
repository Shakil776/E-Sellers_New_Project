<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Invoice</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
		.padd-20{
			padding: 20px;
		}
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
    </style>
</head>
<body>
	<div class="container">
		<div class="row padd-20">
			<div class="col-xs-12">
				<div class="invoice-title">
					<h2>Invoice</h2><h3 class="pull-right">Order # {{ date('dmY', strtotime($order->created_at)).$order->id }}</h3>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-4">
						<address>
						<strong>Billing Address:</strong><br>
						{{ $customer->name }}<br>
						{{ $customer->email }}<br>
						{{ $customer->mobile }}<br>
						{{ $customer->address }}
						</address>
					</div>
					<div class="col-xs-4">
						
						<address>
						<strong>Shipping Address:</strong><br>
						{{ $shipping_address->shipping_name }}<br>
						@if(!empty($shipping_address->shipping_email)){{ $shipping_address->shipping_email }}@endif<br>
						{{ $shipping_address->shipping_mobile }}<br>
						{{ $shipping_address->shipping_address }}
						</address>

					</div>
					<div class="col-xs-4 text-right">
						<img src="{{ asset('admin/images/logo.png') }}" height="100" width="100" alt="Logo" title="Logo" />
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<address>
							<strong>Payment Method: </strong>
							{{ $payment->payment_type }}<br>
							<strong>Payment Status: </strong>
							{{ $payment->payment_status }}
						</address>
					</div>
					<div class="col-xs-6 text-right">
						<address>
							<strong>Order Date:</strong><br>
							{{ date('j F Y', strtotime($order->created_at)) }}<br><br>
						</address>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Order summary</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<th>No.</th>
										<th>Product Name</th>
										<th>Price</th>
										<th>Code</th>
										<th>Qty</th>
										<th>Size</th>
										<th>Color</th>
										<th>Total Price</th>
									</tr>
								</thead>
								<tbody>
									@php($i = 1)
									@php($sum = 0)
	
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
												<td>TK. {{ $total = $product_price * $orderDetail->quantity }}</td>
											</tr>
											@php($sum = $sum + $total)
											@endforeach
	
									
									<tr>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line text-center"><strong>Subtotal</strong></td>
										<td class="thick-line">TK. {{ $sum }}</td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line text-center"><strong>Vat(2%)</strong></td>
										<td class="no-line">TK. {{ $vat = $sum * (2/100) }}</td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line text-center"><strong>Shipping Cost</strong></td>
										<td class="no-line">TK. 0</td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line text-center"><strong>Total</strong></td>
										<td class="no-line">TK. {{ round($sum + $vat) }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>


