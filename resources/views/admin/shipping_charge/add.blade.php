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
            <h1>Add New Shipping Charge</h1>
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
                <h3 class="card-title">New Shipping Charge's Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">

                  <div class="form-group">
                    <label>Shipping Charge Name <span style="color: red;">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Shipping Charge Name">
                  </div>

                  <div class="form-group">
                    <label>Price<span style="color: red;">*</span></label>
                    <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="Price">
                  </div>

                  <div class="form-group">
                    <label>Status<span style="color: red;">*</span></label>
                    <select class="form-control"  name="status" value="{{ old('status') }}">
                        <option {{ (old('status') == 0) ? 'selected'  : '' }} value="0">Active</option>
                        <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>

                  </div>

                </div>
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

@section('script')
@endsection