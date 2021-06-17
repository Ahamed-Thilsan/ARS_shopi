@extends('Layouts.adminapp')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Attribute</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Add Attribute</li>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <small>Add Attribute</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form id="personal-info"method="post"action="{{url('/products/add-atributes/'.$productDetails->id )}} " name="edit_product"id="edit_product"noalidate="noalidate">
               {{ csrf_field() }}
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-user-circle-o"></i>
                   Attributes
                </h4>
                
                <Input type="hidden" name="product_id" id ="product_id"value="{{$productDetails->id}}">
                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">product Name </label>
                  <label for="input-1" class="col-sm-2 col-form-label"><strong>{{$productDetails->product_name}} </strong></label>
                </div>

                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">product Code </label>
                  <label for="input-1" class="col-sm-2 col-form-label"> <strong>{{$productDetails->product_code}} </strong> </label>
                </div>

                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">product Color </label>
                  <label for="input-1" class="col-sm-2 col-form-label"> <strong>{{$productDetails->product_color}} </strong> </label>
                </div>

                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label"> </label>
                  <div class="field_wrapper">
                  <input type="text" name="sku[]" id="sku" placeholder="SKU" required/>
                  <input type="text" name="size[]" id="size" placeholder="Size"/>
                  <input type="text" name="price[]" id="price" placeholder="Price"/>
                  <input type="text" name="stock[]" id="stock" placeholder="Stock" required/>
                  <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                 </div>
                </div> 
                <div class="form-footer">
                    <button type="submit" value ="Add product " class="btn btn-primary"> Add Attributes</button>
                </div>
              </form>
    
              </div>
        </div>  
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> View Attributes</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Attribute ID</th>
                        <th> SKU</th>
                        <th> Size</th>
                        <th> Price</th>
                        <th> Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    @foreach($productDetails['attributes'] as $attribute)
                    <tr>
                        <td>{{ $attribute->id }}</td>
                        <td>{{ $attribute->sku }}</td>
                        <td>{{ $attribute->size }}</td>
                        <td>{{ $attribute->price }}</td>
                        <td>{{ $attribute->stock }}</td>
                        
                        
                        <td>
                        <a href="{{ url('products/delete-attributes/'.$attribute->id) }}" class="btn btn-outline-danger waves-effect waves-light m-1" style="font-size:12px"> <i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                </div>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                       <th>Attribute ID</th>
                        <th> SKU</th>
                        <th> Size</th>
                        <th> Price</th>
                        <th> Stock</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->
    </div>
      </div><!--End Row-->
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>

    <!--End Back To Top Button-->
    <script>
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="sku[]" id="sku" placeholder="Sku" /> <input type="text" name="size[]" id="size" placeholder="Size" /> <input type="text" name="price[]" id="price" placeholder="Price" /> <input type="text" name="stock[]" id="stock" placeholder="Stock" /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection