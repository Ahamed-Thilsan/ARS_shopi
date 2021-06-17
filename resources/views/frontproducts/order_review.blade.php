@extends('Layouts.productsapp')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="active">Checkout</li>
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
            <form name="paymentForm" id="paymentForm" action="{{url ('/place-order')}}" method="post">{{ csrf_field() }}
            
                    <div class="col-md-3">
						<div class="billing-details">
							<p>Already a customer ? <a href="#">Login</a></p>
							<div class="section-title">
								<h3 class="title">Billing Address</h3>
							</div>
							<div class="form-group">
								{{$userDetails->name}}
							</div>
							<div class="form-group">
								{{$userDetails->address}}
							</div>
							<div class="form-group">
								{{$userDetails->city}}
							</div>
							<div class="form-group">
								{{$userDetails->state}}
							</div>
							<div class="form-group">
								{{$userDetails->country}}
							</div>
							<div class="form-group">
								{{$userDetails->pincode}}
							</div>
							<div class="form-group">
								{{$userDetails->telephone}}
							</div>
						</div>
					</div>
                

					<div class="col-md-3">
						<div class="billing-details">
							<p>Already a customer ? <a href="#">Login</a></p>
							<div class="section-title">
								<h3 class="title">Shipping Details</h3>
							</div>
							<div class="form-group">
								{{$shippingDetails->name}}
							</div>
							<div class="form-group">
								{{$shippingDetails->address}}
							</div>
							<div class="form-group">
								{{$shippingDetails->city}}
							</div>
							<div class="form-group">
								{{$shippingDetails->state}}
							</div>
							<div class="form-group">
								{{$shippingDetails->country}}
							</div>
							<div class="form-group">
								{{$shippingDetails->pincode}}
							</div>

							<div class="form-group">
								{{$shippingDetails->telephone}}
							</div>
							
						</div>
                    </div>
                    <?php $ship_cost = 5; ?>
                    <div class="col-md-6">
                    <input type="hidden" name="total_amount"  value="">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Shiping Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" checked>
								<label for="shipping-1">Free Cost -  RM {{$ship_cost}} </label>
								<div class="caption">
									
								</div>
							</div>
							
                            <div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods</h4>
							</div>
							
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2" name="payment_method" id="COD" value="COD">COD</label>
								<div class="caption">
									<p>Cash On Delivery
										<p>
								</div>
							</div>
						</div>
						</div>
                        
					</div>


					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review & Payment</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										
									</tr>
								</thead>
								<tbody>
                                <?php $total_amount = 0; ?>
								<?php $ship_cost = 5; ?>
                                @foreach($userCart as $cart)
									<tr>
										<td class="thumb"><img src="{{asset('assets/dist/img/x_small/'.$cart->image)}}" alt=""></td>
										<td class="details">
											<a href="#">{{$cart->product_name}}</a>
											<ul>
                                                <li><span>Code: {{$cart->product_code}}</span></li>
												<li><span>Size: {{$cart->size}}</span></li>
												<li><span>Color: {{$cart->product_color}}</span></li>
											</ul>
										</td>
										<td class="price text-center"><strong>RM {{$cart->price}}</strong></td>
										<td class="qty text-center">{{$cart->quantity}}</td>
										<td class="total text-center"><strong class="primary-color">RM {{$cart->price*$cart->quantity}}</strong></td>
									</tr>
                                    <?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
                                    @endforeach
								</tbody>
								<tfoot>
									<tr>
                                  
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">RM {{$total_amount}}</th>
									</tr>
									<tr>
										<th class="empty" colspan="3" id="ship_cost"></th>
										<th>SHIPING</th>
										<td colspan="2">RM {{$ship_cost}}</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">RM {{$total_amount + $ship_cost}} </th>
									</tr>
								</tfoot>
							</table>
                            <input type="hidden" name="total_amount"  value="{{$total_amount}}">
							<div class="pull-right">
								<button type="submit" class="primary-btn">Place Order</button>
							</div>
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