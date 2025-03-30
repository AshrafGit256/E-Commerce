@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Blog</h1>
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
                <h3 class="card-title">New Blog's Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                    <label>Title<span style="color: red;">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                    <div style="color: red;">{{ $errors->first('title') }}</div>
                  </div>

                  <div class="form-group">
                    <label>Slug<span style="color: red;">*</span></label>
                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="Slug Ex. URL">
                    <div style="color: red;">{{ $errors->first('slug') }}</div>
                  </div>

                <div class="form-group">
                    <label>Category Name <span style="color: red;">*</span></label>
                    <select class="form-control" name="blog_category_id" required>
                      <option value="">Select</option>
                      @foreach($getCategory as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Image<span style="color: red;">*</span></label>
                    <input type="file" name="image_name" class="form-control" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Short Description<span style="color: red;">*</span></label>
                    <textarea name="short_description" class="form-control" required placeholder="Short Description"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Description<span style="color: red;">*</span></label>
                    <textarea name="description" class="form-control editor" placeholder="Description"></textarea>
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
                    <label>Meta Title<span style="color: red;">*</span></label>
                    <input type="text" name="meta_title" value="{{ old('mete_title') }}" class="form-control" required placeholder="Meta title">
                  </div>

                  <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" placeholder="meta_description" id=""></textarea>
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
<script src="{{ url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
  $('.editor').summernote({
            height: 200
        });
</script>
@endsection