@extends('Layouts.productsapp')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li><a href="{{url ('/orders')}}">Orders</a></li>
                <li class="active">{{$orderDetails->id}}</li>
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
								<h3 class="title">Orders Details</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th><strong class="primary-color">Product Code</th>
										<th><strong class="primary-color">Product Name</th>
										<th class="text-center" ><strong class="primary-color">Product Size</strong></th>
                                        <th class="text-center"><strong class="primary-color">Product Color</th>
										<th class="text-center"><strong class="primary-color">Product Price</th>
                                        <th class="text-center"><strong class="primary-color">Product Qty</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
								
                                @foreach($orderDetails->orders as $pro)
									<tr>
										<td class="thumb"><strong>{{ $pro->product_code}}</td>
                                        <td class="thumb"><strong>{{ $pro->product_name}}</strong>
										<td class="thumb text-center"><strong>{{ $pro->product_size}}<br><del class="font-weak"></del></td>
										<td class="thumb text-center"><strong>{{ $pro->product_color}}</strong></td>
                                        <td class="thumb text-center"><strong>RM {{ $pro->product_price}}</strong></td>
                                        <td class="thumb text-center"><strong>{{ $pro->product_qty}}</strong></td>
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