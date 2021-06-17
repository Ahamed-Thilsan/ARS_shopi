@extends('Layouts.productsapp')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li class="active">Thanks</li>
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
							<div class="section-title" align="center">
								<h3 class="title">YOUR COD ORDER HAS BEEN PLACED</h3>
                                <p> Your order number is {{Session::get('order_id') }} and total payable about is RM {{Session::get('total') }}</p>
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

<?php 
Session::forget('total');
Session::forget('order_id');
?>
