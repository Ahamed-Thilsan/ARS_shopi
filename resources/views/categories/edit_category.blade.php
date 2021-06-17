@extends('layouts.adminapp')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add category</li>
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
                <h3 class="card-title"> <small>Add category</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form"method="post"action="{{ url('/categories/edit-category/'.$categoryDetails->id) }}" name="edit_category"id="edit_category"noalidate="noalidate">
            {{ csrf_field() }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="name">Sub Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name" value="{{$categoryDetails->name}}" required>
                  </div>      

                  <div class="form-group">
                  <label for="input-6" class="col-sm-2 col-form-label"> Main Category</label>
                  <select class="form-control" id="input-6" name="parent_id" required>
                        <option value="0">Select Your Main Category</option>
                        @foreach($levels as $val)
                        <option value="{{ $val->id}}" @if($val->id == $categoryDetails->parent_id) selected @endif>{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
                    <!-- Main content -->
                    <div class="form-group">
                  <label for="input-9">Description</label>
                    <textarea class="form-control" rows="4" id="description" name="description" required> {{$categoryDetails->description}}</textarea>
                </div>
                    <!-- /.card-header -->
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control" id="url" placeholder="Enter URL" value="{{$categoryDetails->url}}" required>
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