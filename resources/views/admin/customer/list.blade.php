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
            <h1>Customer List (Total : {{ $getRecord->total() }})</h1>
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
                <h3 class="card-title">Customer List</h3>
              </div>

              @include('admin.layouts._message')

            <form method="get">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" name="id" placeholder="ID" class="form-control" value="{{ Request::get('id') }}">
                    </div>
                  </div>

                  <div class="col-md-2">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{ Request::get('name') }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Emails</label>
                    <input type="text" name="email" placeholder="Email" class="form-control" value="{{ Request::get('email') }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>From Date</label>
                    <input type="date" style="padding: 6px;" name="from_date" class="form-control" value="{{ Request::get('from_date') }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>To Date</label>
                    <input type="date" style="padding: 6px;" name="to_date" class="form-control" value="{{ Request::get('to_date') }}">
                  </div>
                </div>

                </div>

                <div class="row">
                  <div class="col-md-2">
                    <button class="btn btn-primary">Search</button>
                    <a href="{{ url('admin/customer/list') }}" class="btn btn-success">Reset</a>
                  </div>
                </div>

              </div>

                

              </div>
            </div>

          </form>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr class="btn-primary">
                      <th>#</th>
                      <!-- <th>Profile Pic</th> -->
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{ ($value->status == 0) ? "Active" : "Inactive"}}</td>
                    <td>{{ date('d-m-y H:i A', strtotime($value->created_at)) }}</td>
                    <td width="250px">
                      <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>

                <div style="padding: 10px; float:right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>

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
