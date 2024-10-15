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
            <h1>Edit Slider</h1>
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
                <h3 class="card-title">Edit Slider's Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                
                  <div class="form-group">
                    <label>Title <span style="color: red;">*</span></label>
                    <input type="text" name="title" value="{{ $getRecord->title }}" class="form-control" placeholder="Enter Title">
                  </div>

                  <div class="form-group">
                    <label>Image <span style="color: red;"></span></label>
                    <input type="file" name="image_name" class="form-control" >
                    @if(!empty($getRecord->getImage()))
                        <img src="{{ $getRecord->getImage() }}" style="height: 100px;">
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Button Name <span style="color: red;"></span></label>
                    <input type="text" name="button_name"  value="{{ $getRecord->button_name }}" class="form-control" placeholder="Enter Button Name">
                  </div>

                  <div class="form-group">
                    <label>Button Link <span style="color: red;"></span></label>
                    <input type="text" name="button_link"  value="{{ $getRecord->button_link }}" class="form-control" placeholder="Enter Button Link">
                  </div>

                  <div class="form-group">
                    <label>Status<span style="color: red;">*</span></label>
                    <select class="form-control"  name="status" value="{{ old('status') }}">
                        <option {{ ($getRecord->status == 0) ? 'selected'  : '' }} value="0">Active</option>
                        <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
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