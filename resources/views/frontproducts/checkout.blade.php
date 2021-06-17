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
				<form id="checkout-form" class="clearfix" action="{{ url('/checkout')}}" method="post">{{ csrf_field() }}
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
					<div class="col-md-6">
						<div class="billing-details">
							
							<div class="section-title">
								<h3 class="title">Bill To</h3>
							</div>
							<div class="form-group">
								<input class="login-input" type="text" name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{$userDetails->name}}" @endif  placeholder="Billing Name" >
							</div>
							<div class="form-group">
								<input class="login-input" type="text" name="billing_address" id="billing_address" @if(!empty($userDetails->address)) value="{{$userDetails->address}}" @endif  placeholder="Billing Address">
							</div>
							<div class="form-group">
								<input class="login-input" type="text" name="billing_city" id="billing_city" @if(!empty($userDetails->city)) value="{{$userDetails->city}}" @endif  placeholder="Billing City">
							</div>
							<div class="form-group">
								<input class="login-input" type="text" name="billing_state" id="billing_state" @if(!empty($userDetails->state)) value="{{$userDetails->state}}" @endif  placeholder="Billing State">
							</div>
							<div class="form-group">
								<input class="login-input" type="text" name="billing_country" id="billing_country"  @if(!empty($userDetails->country))value="{{$userDetails->country}}" @endif  placeholder="Billing Country">
							</div>
							<div class="form-group">
								<input class="login-input" type="text" name="billing_pincode" id="billing_pincode"  @if(!empty($userDetails->pincode))value="{{$userDetails->pincode}}" @endif  placeholder="Billing Pincode">
							</div>
							<div class="form-group">
								<input class="login-input" type="tel" name="billing_telephone" id="billing_telephone" @if(!empty($userDetails->telephone))value="{{$userDetails->telephone}}" @endif  placeholder="Billing Telephone">
							</div>
							<div class="form-group">
								<div class="login-input-checkbox">
									<input type="checkbox" id="copyAddress">
									<label class="font-weak" for="copyAddress">Shipping Address same as Billing Address</label>
								
								</div>
							</div>
						</div>
					</div>
                

					<div class="col-md-6">
						<div class="billing-details">
							<p>Already a customer ? <a href="#">Login</a></p>
							<div class="section-title">
								<h3 class="title">Ship To</h3>
							</div>
							<div class="form-group">
								<input name="shipping_name" id="shipping_name" @if(!empty($shippingDetails->name)) value="{{$shippingDetails->name}}" @endif  class="login-input" type="text"  placeholder="Shipping Name" >
							</div>
							<div class="form-group">
								<input name="shipping_address" id="shipping_address"  @if(!empty($shippingDetails->address)) value="{{$shippingDetails->address}}" @endif  class="login-input" type="text"   placeholder="Shipping Address">
							</div>
							<div class="form-group">
								<input name="shipping_city" id="shipping_city"   @if(!empty($shippingDetails->city)) value="{{$shippingDetails->city}}" @endif  class="login-input" type="text"   placeholder="Shipping City">
							</div>
							<div class="form-group">
								<input name="shipping_state" id="shipping_state"  @if(!empty($shippingDetails->state)) value="{{$shippingDetails->state}}" @endif  class="login-input" type="text"  placeholder="Shipping state">
							</div>
							<div class="form-group">
								<input name="shipping_country" id="shipping_country"  @if(!empty($shippingDetails->country)) value="{{$shippingDetails->country}}" @endif  class="login-input" type="text"   placeholder="Shipping County">
							</div>
							<div class="form-group">
								<input name="shipping_pincode" id="shipping_pincode"  @if(!empty($shippingDetails->pincode)) value="{{$shippingDetails->pincode}}" @endif  class="login-input" type="text"  placeholder="Shipping Pincode">
							</div>

							<div class="form-group">
								<input  name="shipping_telephone" id="shipping_telephone"  @if(!empty($shippingDetails->telephone)) value="{{$shippingDetails->telephone}}" @endif  class="login-input" type="text"  placeholder="Shipping Telephone">
							</div>
							
						</div>
                    </div>
                    
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="pull-right">
								<button class="primary-btn">Place Order</button>
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