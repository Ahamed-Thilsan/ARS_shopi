	<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="/">
							<img src="./img/shopy-logo.png" alt=""> 
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form action="{{url ('/search-products')}}" method="post">
						{{ csrf_field() }}
							<input class="input search-input" type="text" placeholder="Enter your keyword" name="product">
							<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
	
				<div class="pull-right ">
					<ul class="header-btns">
						<!-- Account -->
				
						<li class="header-account dropdown default-dropdown">
					
				
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
							
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							@guest
							<a href="{{ route('login') }}" class="text-uppercase">{{ __('Login') }}</a> / 
							@if (Route::has('register'))
							<a href="{{ route('register') }}" class="text-uppercase">{{ __('Reg') }}</a>
                            @endif
                        @else
							<ul class="custom-menu">
								<li><a href="{{url ('/orders')}}"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="{{url('/about-us')}}"><i class="fa fa-heart-o"></i>About Us</a></li>
								<li><a href="{{url('/live-stream')}}"><i class="fa fa-exchange"></i> Live Stream</a></li>
								<li><a href="{{url ('/checkout')}}"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a href="{{ route('login') }}"><i class="fa fa-unlock-alt"></i> {{ __('Login') }}</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>	
							</ul>
						</li>
						<!-- Cart -->
						<?php $total_amount = 0; ?>
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									@foreach($userCart as $cart)
									<span class="qty"></span>
									<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
									@endforeach
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>RM <?php echo $total_amount; ?></span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
									@foreach($userCart as $cart)
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="{{asset('assets/dist/img/x_small/'.$cart->image)}}" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">RM {{$cart->price}}<span class="qty">x {{$cart->quantity}}</span></h3>
												<h2 class="product-name"><a href="#">{{str_limit($cart->product_name, 29, ' ...') }}</a></h2>
											</div>
											<a class="cancel-btn" href="{{url ('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-trash"></i></a>
										</div>
										
										@endforeach
									</div>
									<div class="shopping-cart-btns">
										<a href="{{ url('/cart') }}" class="main-btn">View Cart</a>
										<a href="{{url ('/checkout')}}" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
						</li>
						
						<!-- /Cart -->
						<li class="header-account dropdown default-dropdown">
						<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-user-o"></i>
								<strong class="text-uppercase">{{ Auth::user()->name }}</strong>
							</div>
							
                                    <a class="text-uppercase" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        @endguest
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div> 
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->                      

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
					@foreach($categories as $cat)
					
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$cat->name}} <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
							
								<div class="row">
									<div class="col-md-4">
									@foreach($cat->categories as $subcat)
										<ul class="list-links">
											<li>
											<li><a href="{{asset('/frontproducts/'.$subcat->url)}}">{{$subcat->name}}</a></li>
										</ul>
										
										@endforeach
										<hr class="hidden-md hidden-lg">
									</div>
								</div>
								
							</div>
						</li>
						@endforeach
					</div>	
				<!-- /category nav -->
				

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="/">Home</a></li>
						@foreach($categorie as $cate)
								<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{$cate->name}} <i class="fa fa-caret-down"></i></a>
								
							<ul class="custom-menu">
							@foreach($cate->categories as $subcat)
								<li><a href="{{asset('/frontproducts/'.$subcat->url)}}">{{$subcat->name}}</a></li>
								@endforeach
							</ul>
							
						</li>
							@endforeach
							
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->