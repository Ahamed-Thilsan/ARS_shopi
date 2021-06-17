@extends('Layouts.adminapp')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
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
                <h3 class="card-title"> <small>Edit Post</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
         <form enctype="multipart/form-data" id="personal-info"method="post"action="{{url('Blog_posts/edit-post/'.$postDetails->id)}}" name="add-post"id="add-post"noalidate="noalidate">
            {{ csrf_field() }}
            
            <div class="card-body">
                <div class="form-group">
                    <label for="product_name">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title"value="{{$postDetails->title}}" required>
                  </div>      

                <div class="form-group">
                    <label for="product_code">Auther Name</label>
                    <input type="text" class="form-control" id="authername" name="authername" value="{{$postDetails->authername}}" required>
                  </div>

                <div class="form-group">
                  <label for="description">Description</label>
                    <textarea class="form-control" rows="4" id="description" name="description" required>{{$postDetails->description}}</textarea>
                </div>

                </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
        </form>
            </div>
                </div>
                </div>
 </div>
    </section>
    <!-- /.content -->
  </div>
@endsection