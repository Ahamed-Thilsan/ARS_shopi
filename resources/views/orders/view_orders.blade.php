@extends('Layouts.adminapp')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ORDERS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Orders</a></li>
              <li class="breadcrumb-item active">View Orders</li>
            </ol>
          </div>
        </div>
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr bgcolor="#C6E6F3">

                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Customer E-Mail</th>
                        <th>Ordered Product</th>
                        <th>Order Amount</th>
                        <th>Order Status</th>
                        
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->user_email }}</td>
                        <td>
                        @foreach($order->orders as $pro)
                         {{$pro->product_code}}-{{$pro->product_size}}
                         ({{$pro->product_qty}})
                         <br>
                        @endforeach
                        </td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->order_status }}</td>
                       
                       
                       

                        
                        <td>
                        <a target="_blank "href="{{url('order/view-order/'.$order->id)}}" class="btn btn-info shadow-info waves-effect waves-light m-1" style="font-size:12px">View Order Details</a>
                        
                        </td>
                  </tr>
                @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection