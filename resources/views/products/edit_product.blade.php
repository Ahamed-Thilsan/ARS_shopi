@extends('Layouts.adminapp')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <small>Edit Product</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data" id="personal-info"method="post"action="{{ url('products/edit-product/'.$productDetails->id) }}" name="add_product"id="add_product"noalidate="noalidate">
            {{ csrf_field() }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="product_name">PRODUCT NAME</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{$productDetails->product_name}}"required>
                  </div>     
                  <div class="form-group">
                  <label for="category_id" class="col-sm-2 col-form-label">UNDER CATEGORY</label>
                  <select class="form-control" id="category_id" name="category_id" required>
                        <?php echo $categories_dropdown; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_code">PRODUCT CODE</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" value="{{$productDetails->product_code}}"required>
                  </div>  
                  <div class="form-group">
                    <label for="product_color">PRODUCT COLOR</label>
                    <input type="text" class="form-control" id="product_color" name="product_color" value="{{$productDetails->product_color}}" required>
                  </div>  
                  <div class="form-group">
                    <label for="old_price">PRODUCT OPENING PRICE</label>
                    <input type="text" class="form-control" id="old_price" name="old_price" value="{{$productDetails->old_price}}">
                  </div> 
                  <div class="form-group">
                    <label for="price">PRODUCT PRICE</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{$productDetails->price}}"required>
                  </div>
                  

                    <div class="form-group">
                  <label for="input-8" class="col-sm-2 col-form-label">Select Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <input type="hidden" name="current_image" value="{{$productDetails->image}}">
                    <img src=" {{asset('assets/dist/img/x_small/'.$productDetails->image)}}" width=50px hight="60px"> | <a href="{{url('products/delete-product-image/.$productDetails->id')}}">Delete</a>
                  </div>

                  <div class="form-group">
                    <label for="product_status">PRODUCT STATUS</label>
                    <input type="text" class="form-control" id="product_status" name="product_status" value="{{$productDetails->product_status}}">
                  </div>

                  <div class="form-group">
                    <label for="brand">PRODUCT BRAND</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{$productDetails->brand}}"required>
                  </div>

                  <div class="form-group">
                  <label for="details">Details</label>
                    <textarea class="form-control" rows="4" id="details" name="details" required>{{$productDetails->details}}"</textarea>
                </div>
                    <!-- Main content -->
                    <div class="form-group">
                  <label for="description">Description</label>
                    <textarea class="form-control" rows="4" id="description" name="description" required>{{$productDetails->description}}"</textarea>
                </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
            </form>
                    </div>
                    <!-- /.card -->
                    </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
                </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection