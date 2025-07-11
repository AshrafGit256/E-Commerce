@extends('admin.layouts.app')

@section('style')
<!-- Include any specific styles if necessary -->
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="{{ url('admin/product/add') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i> Add New Product</a>
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
                <h3 class="card-title">Product List</h3>
              </div>

              @include('admin.layouts._message')
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr class="btn-primary">
                      <th>#</th>
                      <th>Title</th>
                      <th>SKU</th>
                      <th>In Stock</th>
                      <th>Sold Out</th>
                      <th>Created By</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->sku }}</td>
                        <td>{{ $value->in_stock }}</td> <!-- Display in_stock -->
                        <td>{{ $value->out_of_stock }}</td> <!-- Display out_of_stock -->
                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                        <td width="300px">
                            <a href="{{ url('admin/product/edit/'.$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ url('admin/product/delete/'.$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                 @endforeach
                  </tbody>
                </table>
              </div>
             
            </div>
            <div style="padding: 10px; float:right;">
                    {!! $getRecord->appends(request()->except('page'))->links() !!}
            </div>
          </div>
        </div>
      </div>
    </section>
    
</div>
@endsection

@section('script')
<!-- Include any specific scripts if necessary -->
@endsection
