@extends('Layouts.productsapp')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="active">Orders</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
    
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Your Orders</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th><strong class="primary-color">Order ID</th>
										
										<th><strong class="primary-color">Ordered Products</th>
										<th class="text-center" ><strong class="primary-color">payment Method</strong></th>
                                        <th class="text-center"><strong class="primary-color">Total</th>
										<th class="text-center"><strong class="primary-color">Created on</th>
										<th class="text-center"><strong class="primary-color">Order Status</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
								
                                @foreach($orders as $order)
									<tr>
										<td class="thumb"><strong>{{ $order->id}}</td>
                                        
                                        <td class="thumb"><strong>
                                        @foreach($order->orders as $pro)
                                        <a href="{{url ('/orders/'.$order->id)}}"> {{$pro->product_name}}-{{$pro->product_size}}</a><br>
                                        @endforeach
                                        </td>
										<td class="thumb text-center"><strong>COD<br><del class="font-weak"></del></td>
										<td class="thumb text-center"><strong>{{ $order->total}}</strong></td>
										<td class="thumb text-center"><strong>{{ $order->created_at}}</strong></td>
										
										<td class="thumb text-center">
											
										<strong>{{ $order->order_status}}</strong></td>
									</tr>
									
                                @endforeach
								<tfoot>
									
								</tbody>
							</table>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection