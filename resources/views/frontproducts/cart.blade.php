@extends('Layouts.productsapp')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li> <a href="#">Products</a></li>
				<li><a href="#">Products Details</a></li>
				<li class="active">Shoping Cart</li>
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
                @if(Session::has('flash_message_error'))
         <div class="alert alert-danger alert-dismissible" role="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong>Danger! </strong>{!! session('flash_message_error') !!}</span>
				    </div>
                  </div>
         @endif
         @if(Session::has('flash_message_success'))
                <div class="alert alert-info alert-dismissible" role="alert">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon">
					 <i class="icon-check"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong>Success! </strong>{!! session('flash_message_success') !!}</span>
				    </div>
                  </div>
         @endif
					
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Shoping Cart</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
								<?php $total_amount = 0; ?>
                                @foreach($userCart as $cart)
									<tr>
										<td class="thumb"><img src="{{asset('assets/dist/img/x_small/'.$cart->image)}}" alt=""></td>
										<td class="details">
											<a href="#">{{$cart->product_name}}</a>
											<ul>
                                                <li><span>Code: {{$cart->product_code}}</span></li>
												<li><span>Size:{{$cart->size}}</span></li>
												<li><span>Color: {{$cart->product_color}}</span></li>
											</ul>
										</td>
										<td class="price text-center"><strong>RM {{$cart->price}}</strong><br><del class="font-weak"></del></td>
										<td class="qty text-center"><input class="input" type="number" value="{{$cart->quantity}}"><a href="{{url ('/cart/update-quantity/'.$cart->id.'/1') }}"></td>
										<td class="total text-center"><strong class="primary-color">RM {{$cart->price*$cart->quantity}}</strong></td>
										<td class="text-right"><a href="{{url ('/cart/delete-product/'.$cart->id)}}" class="main-btn icon-btn"><i class="fa fa-close"></i></a></td>
									</tr>
									<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
                                @endforeach
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">RM <?php echo $total_amount; ?></th>
									</tr>
								</tbody>
							</table>
							<div class="pull-right">
								<a class="primary-btn" href="{{url ('/checkout')}}">Check Out</a>
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