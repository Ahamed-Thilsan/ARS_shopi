@extends('Layouts.adminapp')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DISPLAY PRODUCTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View products</li>
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
                <h3 class="card-title">All Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr bgcolor="#C6E6F3">

                  <th>Product ID</th>
                        <th>Category ID</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Product Color</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ str_limit($product->product_name, 10, ' ...') }}</td> 
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->product_color }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                        @if(!empty($product->image))
                        <img src="{{asset('assets/dist/img/x_small/'.$product->image)}}" width=30px hight="30px">
                       
                        </td>
                        @endif

                        
                        <td>
                        <a href="{{ url('products/add-atributes/'.$product->id) }}" class="btn btn-info shadow-info waves-effect waves-light m-1" style="font-size:12px">ADD</a>
                        <a href="{{ url('products/edit-product/'.$product->id) }}" class="btn btn-outline-success waves-effect waves-light m-1" style="font-size:12px"> <i class="fa fa-edit"></i> </i> </a> 
                        <a href="{{ url('products/delete-product/'.$product->id) }}" class="btn btn-outline-danger waves-effect waves-light m-1" style="font-size:12px"> <i class="fa fa-trash"></i> </a>
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