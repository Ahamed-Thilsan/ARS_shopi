@extends('Layouts.apps')
@section('content')
	
	<!-- HOME -->
<div class="section-grey">
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<!-- banner -->
					<div class="banner banner-1">
						<img src="./img/test3.png" alt="">
						<div class="banner-caption text-center">
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="./img/Bannertest2.jpg" alt="">
						<div class="banner-caption">
						<!--	<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1> -->
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="./img/47b8a382493275.5d1ef8321d687.jpg" alt="">
						<div class="banner-caption">
							<!--<h1 class="white-color">New Product <span>Collection</span></h1>
							<button class="primary-btn">Shop Now</button> -->
						</div>
					</div>
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	</div>
	<!-- /HOME -->
	<!-- section -->
	<div class="section-grey">
		<!-- container -->
		<div class="container">
			
			
				

<br>
			
				
				

				<!-- banner -->
				<!--<div class="col-md-1 col-md-offset-0 col-sm-6 col-sm-offset-3">
					<a class="banner banner-1" href="#">
						<img src="./img/banner12.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>-->
				<!-- /banner -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<!-- section title -->
			@foreach($productsAll as $latestProduct)
				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>{{$latestProduct->product_status}}</span>
								<!--<span class="sale">-20%</span>-->
							</div>
							<a href="{{url('product/'.$latestProduct->id)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
							<img src="{{asset('assets/dist/img/large/'.$latestProduct->image)}}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">RM {{$latestProduct->price}} <del class="product-old-price">{{$latestProduct->old_price}}</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<p class="product-name"><a href="{{url('product/'.$latestProduct->id)}}"> {{str_limit($latestProduct->product_name, 50, ' ...') }}</a></p>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<a href="{{url('product/'.$latestProduct->id)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="./img/banner15.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->
				@foreach($productAll as $product)
				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>{{$product->product_status}}</span>
								<span class="sale">-20%</span>
							</div>
							<a href="{{url('product'.$product->id)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
							<img src="{{asset('assets/dist/img/large/'.$product->image)}}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">RM {{$product->price}} <del class="product-old-price">{{$product->old_price}}</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<p class="product-name"><a href="{{url('product/'.$product->id)}}">{{str_limit($product->product_name, 50, ' ...') }}</a></p>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<a href="{{url('product/'.$product->id)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->

				
			</div>
			<!-- /row -->

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
				@foreach($products_All as $pickProduct)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>{{$pickProduct->product_status}}</span>
								<!--<span class="sale">-20%</span>-->
							</div>
							<a href="{{url('product/'.$pickProduct->id)}}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
							<img src="{{asset('assets/dist/img/large/'.$pickProduct->image)}}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price"> RM {{$pickProduct->price}} <del class="product-old-price">{{$pickProduct->old_price}}</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<p class="product-name"><a href="#">{{str_limit($pickProduct->product_name, 50, ' ...') }}</a></p>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<a href="{{url('product/'.$pickProduct->id)}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
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