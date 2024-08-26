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
            <h1>Color List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right">
            <a href="{{ url('admin/color/add') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i>  Add New Color</a>
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
                <h3 class="card-title">Color List</h3>
              </div>

              @include('admin.layouts._message')
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr class="btn-primary">
                      <th>#</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Created By</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->code}}</td>
                    <td>{{$value->created_by_name}}</td>
                    <td>{{ ($value->status == 0) ? "active" : "Inactive"}}</td>
                    <td>{{ date('d-m-y', strtotime($value->created_at))}}</td>
                    <td width="200px">
                      <a href="{{ url('admin/color/edit/'.$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i>Edit</a>
                      <a href="{{ url('admin/color/delete/'.$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
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