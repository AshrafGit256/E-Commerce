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
            <h1>Edit Discount Code</h1>
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
                <h3 class="card-title">Edit Discount Code's Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                    <label>Discount Code Name <span style="color: red;">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $getRecord->name) }}" class="form-control" required placeholder="Enter Discount Code Name">
                  </div>

                  <div class="form-group">
                    <label>Type<span style="color: red;">*</span></label>
                    <select class="form-control" name="type">
                        <option value="Amount" {{ old('type', $getRecord->type) == 'Amount' ? 'selected' : '' }}>Amount</option>
                        <option value="Percent" {{ old('type', $getRecord->type) == 'Percent' ? 'selected' : '' }}>Percent</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Percent / Amount<span style="color: red;">*</span></label>
                    <input type="text" name="percent_amount" value="{{ old('percent_amount' , $getRecord->percent_amount) }}" class="form-control" placeholder="Percent / Amount">
                  </div>

                  <div class="form-group">
                    <label>Expire Date<span style="color: red;">*</span></label>
                    <input type="date" name="expire_date" value="{{ old('expire_date', $getRecord->expire_date) }}" class="form-control">
                  </div>
                 
                  <div class="form-group">
                    <label>Status<span style="color: red;">*</span></label>
                    <select class="form-control"  name="status" value="{{ old('status') }}" required>
                        <option {{ (old('status', $getRecord->status) == 0) ? 'selected'  : '' }} value="0">Active</option>
                        <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                  </div>

                </div>
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