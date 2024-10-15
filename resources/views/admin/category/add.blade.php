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
            <h1>Add New Category</h1>
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
                <h3 class="card-title">New Category's Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                    <label>Category Name <span style="color: red;">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Category Name">
                  </div>

                  <div class="form-group">
                    <label>Slug<span style="color: red;">*</span></label>
                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="Slug Ex. URL">
                    <div style="color: red;">{{ $errors->first('slug') }}</div>
                  </div>

                  <div class="form-group">
                    <label>Status<span style="color: red;">*</span></label>
                    <select class="form-control"  name="status" value="{{ old('status') }}">
                        <option {{ (old('status') == 0) ? 'selected'  : '' }} value="0">Active</option>
                        <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
                  </div>

                  <hr style="border: 1px dashed #ccc; margin-top: 35px;">

                  <div class="form-group">
                      <label>Image<span style="color: red;">*</span></label> <!-- Add * if it's a required field -->
                      <input type="file" name="image_name" class="form-control">
                  </div>


                  <div class="form-group">
                    <label>Button Name <span style="color: red;"></span></label>
                    <input type="text" name="button_name" value="{{ old('button_name') }}" class="form-control"  placeholder="Enter Button Name">
                  </div>

                  <div class="form-group">
                    <label style="display: block;">Home Screen<span style="color: red;"></span></label>
                    <input type="checkbox" name="is_home">
                  </div>

                  <div class="form-group">
                    <label style="display: block;">Menu<span style="color: red;"></span></label>
                    <input type="checkbox" name="is_menu">
                  </div>
                  

                  <hr style="border: 1px dashed #ccc;">

                  <div class="form-group">
                    <label>Meta Title<span style="color: red;">*</span></label>
                    <input type="text" name="meta_title" value="{{ old('mete_title') }}" class="form-control" required placeholder="Meta title">
                  </div>

                  <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" placeholder="meta_description" id="">{{  old('meta_description')}}</textarea>
                  </div>

                  <div class="form-group">
                    <label>Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="form-control" placeholder="Meta Keywords">
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