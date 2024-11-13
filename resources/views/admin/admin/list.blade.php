@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
    <section class="content-header">

    <h2 class="mb-2">Recently Added Admins</h2>
    <div class="row">
        @foreach($latestUsers as $user)
            <div class="col-md-4">
                <div class="card card-widget widget-user shadow-sm">
                    <div class="widget-user-header bg-info">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" 
                                 src="{{ !empty($user->getImage()) ? $user->getImage() : asset('upload/user/h2.jpg') }}" 
                                 alt="User Avatar" style="height: 90px; width: 90px; border-radius: 50%;">
                        </div>
                        <h3 class="widget-user-username">{{ $user->name }}</h3>
                        <h5 class="widget-user-desc">{{ $user->role }}</h5> <!-- Assuming role or position is in user model -->
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Email <span class="float-right">{{ $user->email }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Status <span class="float-right badge {{ $user->status == 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $user->status == 0 ? 'Active' : 'Inactive' }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List</h1>
          </div>
          <div class="col-sm-6" style="text-align:right">
            <a href="{{ url('admin/admin/add') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i>  Add New Admin</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          
          <div class="col-md-12">
          @include('admin.layouts._message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Amin List</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr class="btn-primary">
                      <th>#</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>

                    <td>
                        @if(!empty($value->getImage()))
                            <img src="{{ $value->getImage() }}" style="height: 60px; width: 60px; border-radius: 50%">
                        @else
                            <img src="{{ asset('upload/user/h2.jpg') }}" style="height: 60px; width: 60px; border-radius: 50%">
                        @endif
                    </td>


                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{ ($value->status == 0) ? "active" : "Inactive"}}</td>
                    <td width="250px">
                      <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                      <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
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