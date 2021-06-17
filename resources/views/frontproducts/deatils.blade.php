@extends('Layouts.productsapp')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li> <a href="#">Products</a></li>
				<li class="active">Products Details</li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
				@if(Session::has('flash_message_error'))
         <div class="alert alert-danger alert-dismissible" role="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong>Yhoo.. </strong>{!! session('flash_message_error') !!}</span>
				    </div>
                  </div>
         @endif
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="{{asset('assets/dist/img/large/'.$productDetails->image)}}" alt="" width=1000px hight="1000px">
							</div>
							<div class="product-view">
								<img src="{{asset('assets/dist/img/large/'.$productDetails->image)}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{asset('assets/dist/img/large/'.$productDetails->image)}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{asset('assets/dist/img/large/'.$productDetails->image)}}" alt="">
							</div>
						</div>
						<div id="product-view">
							<div class="product-view">
								<img src="{{asset('assets/dist/img/x_small/'.$productDetails->image)}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{asset('assets/dist/img/x_small/'.$productDetails->image)}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{asset('assets/dist/img/x_small/'.$productDetails->image)}}" alt="">
							</div>
							<div class="product-view">
								<img src="{{asset('assets/dist/img/x_small/'.$productDetails->image)}}" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<form name="addtocartForm" id="addtocartForm" action="{{ url('add-cart')}}" method="post">{{ csrf_field() }}
						<input type="hidden" name="product_id" value="{{$productDetails->id }}">

						<input type="hidden" name="product_name" value="{{$productDetails->product_name }}">

						<input type="hidden" name="product_code" value="{{$productDetails->product_code }}">

						<input type="hidden" name="product_color" value="{{$productDetails->product_color }}">

						<input type="hidden" name="price" id="price" value="{{$productDetails->price }}">
						
						<div class="product-body">
						<div class="product-label">
								<span>{{$productDetails->product_status}}</span>
								<!--<span class="sale">-20%</span>-->
							</div>
							<h2 class="product-name">{{$productDetails->product_name}}</h2>
							<h3 class="product-price" id="getPrice"style=color:#F8694A>RM {{$productDetails->price}} <del class="product-old-price" style=color:DarkSlateGray>{{$productDetails->old_price}}</del></h3>
							
							<p id="Availability"><strong>Availability:</strong> @if($total_stock>0) In Stock @else Out Of Stock @endif</p>
							<p><strong>Brand:</strong> {{$productDetails->brand}}</p>
							<p>{{$productDetails->description}}</p>
							<div class="product-options">
                            
                            <div class="select-option-part">
                                    <label >Size*</label>
                                    <select id="selSize" name="size" class="select" required>
									
									<option value="">- Please Select -</option>
                                        @foreach($productDetails->attributes as $sizes)
                                        <option value="{{ $productDetails->id }}-{{$sizes->size}}">{{$sizes->size}}</option>
                                        @endforeach
                                    </select>
                                </div>
								<br>
								<ul class="color-option">
									<li><span class="text-uppercase"><strong>Color:</strong> {{$productDetails->product_color}}</span></li>
									
								</ul>
							</div>

							<div class="product-btns">
								<div class="qty-input">
								@if($total_stock>0)
									<span class="text-uppercase">QTY: </span>
									<input class="input" id="qty" type="number" name="quantity" value="1">
									@endif
								</div>
                                @if($total_stock>0)
								<button type="submit" class="primary-btn add-to-cart" id="cartButton"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								@endif
                               
							</div>
						</div>
					</form>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>{{$productDetails->description}}</p>
								</div>

								<div id="tab2" class="tab-pane fade in ">
									<p><span>&#187;{{$productDetails->details}} <br></span></p>
								</div>

								<div id="tab3" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form class="review-form">
												<div class="form-group">
													<input class="input" type="text" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" placeholder="Email Address" />
												</div>
												<div class="form-group">
													<textarea class="input" placeholder="Your review"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach($relatedProducts as $iteam)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>{{$iteam->product_status}}</span>
								<!--<span class="sale">-20%</span>-->
							</div>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="{{asset('assets/dist/img/large/'.$iteam->image)}}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">RM {{$iteam->price}} <del class="product-old-price">{{$iteam->old_price}}</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<p class="product-name"><a href="#">{{str_limit($iteam->product_name, 50, ' ...')}}</a></p>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<a href="{{url('product/'.$iteam->id)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
							</div>
						</div>	
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

    
   
@endsection
