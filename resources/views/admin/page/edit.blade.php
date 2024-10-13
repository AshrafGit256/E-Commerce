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
            <h1>Edit Page</h1>
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
                <h3 class="card-title">Edit Category's Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{  $getRecord->name }}" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" >
                    @if(!empty($getRecord->getImage()))
                        <img style="width: 200px;" src="{{ $getRecord->getImage() }}" alt="">
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{  $getRecord->title }}" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label>Descriptions</label>
                    <textarea class="form-control editor" name="description">{{  $getRecord->description }}</textarea>
                  </div>

                  <hr>

                  <div class="form-group">
                    <label>Meta Title<span style="color: red;">*</span></label>
                    <input type="text" name="meta_title" value="{{ old('mete_title', $getRecord->meta_title) }}" class="form-control" required placeholder="Meta title">
                  </div>

                  <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" placeholder="meta_description" id="">{{  old('meta_description', $getRecord->meta_description)}}</textarea>
                  </div>

                  <div class="form-group">
                    <label>Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $getRecord->meta_keywords) }}" class="form-control" placeholder="Meta Keywords">
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
<script src="{{ url('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
    $('.editor').summernote({
            height: 200
        });
</script>
@endsection