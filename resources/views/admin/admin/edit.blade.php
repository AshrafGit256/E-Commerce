@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
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
                <h3 class="card-title">Edit Admin's Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Image <span style="color: red;"></span></label>
                    <input type="file" name="image_name" class="form-control" >
                    @if(!empty($getRecord->getImage()))
                        <img src="{{ $getRecord->getImage() }}" style="height: 100px;">
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $getRecord->name) }}" required placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control"  value="{{ old('email', $getRecord->email) }}" required placeholder="Enter Email">
                    <div style="color: red;">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>

                  

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" required>
                        <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Active</option>
                        <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                </div>

                    
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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

@section('script')
@endsection