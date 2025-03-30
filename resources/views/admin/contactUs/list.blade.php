@extends('admin.layouts.app')

@section('style')
<!-- Additional styles for making the page look more professional -->
<style>
    .card-header {
        background-color: #007bff;
        color: white;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color:rgb(63, 62, 62);
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
    .btn-primary, .btn-danger, .btn-success {
        padding: 8px 16px;
        border-radius: 5px;
    }
    .btn-primary i, .btn-danger i, .btn-success i {
        margin-right: 5px;
    }
    .table td, .table th {
        vertical-align: middle;
        text-align: left; /* Change to left alignment */
    }
    .table th {
        text-align: left; /* Ensure header is also left-aligned */
    }
    .pagination {
        margin: 0;
    }
    .form-group label {
        font-weight: 600;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact Us List</h1>
          </div>
          <div class="col-sm-6 text-right">
            <!-- Empty right column for any future actions/buttons -->
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              @include('admin.layouts._message')

              <!-- Search Form -->
              <form method="get" class="mb-4">
                <div class="card-header">
                    <h3 class="card-title">Search Contact Us Entries</h3>
                </div>
                <div class="card-body">
                    <div class="row align-items-end">
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
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Email" class="form-control" value="{{ Request::get('email') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{ Request::get('phone') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" placeholder="Subject" class="form-control" value="{{ Request::get('subject') }}">
                            </div>
                        </div>

                        <div class="col-md-2">
                        <div class="form-group">
                            <button class="btn btn-primary mr-2"><i class="fas fa-search"></i>Search</button>
                            <a href="{{ url('admin/contactUs') }}" class="btn btn-success"><i class="fas fa-sync-alt"></i>Reset</a>
                        </div>
                        </div>
                    </div>
                </div>
              </form>

            </div>
              <!-- Contact Us Table -->
              <div class="card-body p-0">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr class="bg-primary text-white">
                      <th>#</th>
                      <th>Login Name</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ !empty($value->getUser) ? $value->getUser->name : 'Guest' }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->subject }}</td>
                    <td>{{ $value->message }}</td>
                    <td>{{ $value->created_at->format('Y-m-d H:i:s') }}</td>
                    <td width="100px">
                      <a href="{{ url('admin/contactUs/delete/'.$value->id) }}" class="btn btn-danger">
                          <i class="fas fa-trash-alt"></i>Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>

                <!-- Pagination -->
                <div class="pagination-wrapper" style="padding: 10px; float:right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('script')
<!-- Add any additional scripts if needed -->
@endsection
