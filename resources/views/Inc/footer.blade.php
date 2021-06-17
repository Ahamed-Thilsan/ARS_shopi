<!-- FOOTER -->
<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="{{asset('/img/shopy-logo.png') }}" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>YOU CAN CHOOSE US BECAUSE
WE ALWAYS PROVIDE IMPORTANCE</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="{{url ('/orders')}}">My Account</a></li>
							<li><a href="{{url ('/checkout')}}">Checkout</a></li>
							<li><a href="{{ route('register') }}">Register</a></li>
							<li><a href="{{ route('login') }}">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="{{url('/about-us')}}">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						
						<form>
							<div class="form-group">
								<input class="footer-input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
					
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  by <a target="_blank"> I.A Thilsan</a></p>
						
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('/js/jquery.min.js')}}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/slick.min.js') }}"></script>
	<script src="{{ asset('/js/nouislider.min.js') }}"></script>
	<script src="{{ asset('/js/jquery.zoom.min.js')}}"></script>
	<script src="{{ asset('/js/main.js')}}"></script>

	<script>
        $(document).ready(function(){
         $("#selSize").change(function(){
			//alert("test");
			var idSize = $(this).val();
			if(idSize ==""){
                    return false;
                }
			$.ajax({
				type:'get',
				url:'/get-product-price',
				data:{idSize:idSize},
				success:function(resp){
					//alert(resp); return false;
					var arr = resp.split('#');
					$("#getPrice").html("RM "+arr[0]);
					$("#price").val(arr[0]);
						if(arr[1]==0){
					$("#cartButton").hide();
                            $("#availability").text ("Availability: Out Of Stock");
                        }else{
                            $("#cartButton").show();
                            $("#availability").text("Availability: In Stock");
                        }
				},error:function(){
					alert("Error");
				}
			});
		 });
        });
    </script>

<script>
//Copy the shipping address
	$("#copyAddress").click (function(){
	if(this.checked){
		$("#shipping_name").val($("#billing_name").val());
		$("#shipping_address").val($("#billing_address").val());
		$("#shipping_city").val($("#billing_city").val());
		$("#shipping_state").val($("#billing_state").val());
		$("#shipping_country").val($("#billing_country").val());
		$("#shipping_pincode").val($("#billing_pincode").val());
		$("#shipping_telephone").val($("#billing_telephone").val());
	}else{
		$("#shipping_name").val('');
		$("#shipping_address").val('');
		$("#shipping_city").val('');
		$("#shipping_state").val('');
		$("#shipping_country").val('');
		$("#shipping_pincode").val('');
		$("#shipping_telephone").val('');
	}

	});

</script>



