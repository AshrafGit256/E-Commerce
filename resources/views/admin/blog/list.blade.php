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
            <h1>Blog List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right">
            <a href="{{ url('admin/blog/add') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i>  Add New Blog</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          
          <div class="col-md-12">
     
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Blog List</h3>
              </div>

              @include('admin.layouts._message')
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr class="btn-primary">
                      <th>#</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Meta Title</th>
                      <th>Meta Description</th>
                      <th>Meta Keywords</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>
                      @if(!empty($value->getImage()))
                        <img src="{{ $value->getImage() }}" style="height: 85px; border-radius: 20%; width: 100px">
                      @endif
                    </td>
                    <td>{{$value->title}}</td>
                    <td>{{$value->meta_title}}</td>
                    <td>{{$value->meta_description}}</td>
                    <td>{{$value->meta_keywords}}</td>
                    <td>{{ ($value->status == 0) ? "active" : "Inactive"}}</td>
                    <td>{{ date('d-m-y', strtotime($value->created_at))}}</td>
                    <td>
                      <a href="{{ url('admin/blog/edit/'.$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                      <a href="{{ url('admin/blog/delete/'.$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           
          </div>
          
        </div>
        
      </div>
    </section>
    
</div>
@endsection

@section('script')
@endsection