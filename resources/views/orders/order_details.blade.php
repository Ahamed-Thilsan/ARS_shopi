@extends('Layouts.adminapp')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ORDERS {{$orderDetails->id}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Orders</a></li>
              <li class="breadcrumb-item active"><a href="#">View Orders</a></li>
              <li class="breadcrumb-item active">Orders Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  
                  <tbody>
                    <tr>
                      <td>Order Date</td>
                      <td>{{$orderDetails->created_at}}</td>
                     
                      
                    </tr>
                    <tr>
                      <td>Order Status</td>
                      <td>{{$orderDetails->order_status}}</td>
                    </tr>

                    <tr>
                      <td>Order Total</td>
                      <td>RM {{$orderDetails->total}}</td>
                    </tr>

                    <tr>
                      <td>Shipping Charge</td>
                      <td>RM {{$orderDetails->shipping_charges}}</td>
                    </tr>

                    <tr>
                      <td>Payment method</td>
                      <td>Cash On Delivery</td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Billing Address</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  
                  <tbody>
                    <tr>
                      <td>
                          {{$userDetails->name}}<br>
                          {{$userDetails->address}}<br>
                          {{$userDetails->city}}<br>
                          {{$userDetails->state}}<br>
                          {{$userDetails->country}}<br>
                          {{$userDetails->telephone}}<br>
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customer Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  
                  <tbody>
                    <tr>
                      <td>Customer Name</td>
                      <td>{{$orderDetails->name}}</td>
                     
                      
                    </tr>
                    <tr>
                      <td>Customer E-Mail</td>
                      <td>{{$orderDetails->user_email}}</td>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Order Status</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{url ('orders/update-order-status')}}" method="post">{{ csrf_field() }}
              <input type="hidden" name="order_id" value="{{$orderDetails->id}}">

              <div class="form-group">
                    <select class="form-control" id="order_status" name="order_status" required>
                        
                        <option value="New" @if($orderDetails->order_status == "New") selected @endif>New</option>
                        <option value="Pending" @if($orderDetails->order_status == "Pending") @endif>Pending</option>
                        <option value="Cancelled"@if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
                        <option value="In Process"@if($orderDetails->order_status == "In Process") @endif>In Process</option>
                        <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
                        <option value="Delivered" @if($orderDetails->order_status == "Delivered") @endif>Delivered</option>
                        <option value="Paid" @if($orderDetails->order_status == "Paid") @endif>Paid</option>
                    </select>
                </div>
                    <input type="submit" class="btn btn-primary" value="Update Status">
                 
                </form>
                
                </div>
              </div>
     

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Shipping Address</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  
                  <tbody>
                    <tr>
                      <td>
                      {{$orderDetails->name}}<br>
                          {{$orderDetails->address}}<br>
                          {{$orderDetails->city}}<br>
                          {{$orderDetails->state}}<br>
                          {{$orderDetails->country}}<br>
                          {{$orderDetails->telephone}}<br>
                          </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>  
                 <!-- /.card -->
                 <div class="section">
		<!-- container -->
		<div class="container">
            <!-- row -->
            
			<div class="card" style="text-align:center" >
				<form id="checkout-form" class="clearfix">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Orders Information</h3>
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
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection