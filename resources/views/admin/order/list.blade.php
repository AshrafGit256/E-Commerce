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
            <h1>Orders List (Total : {{ $getRecord->total() }})</h1>
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

          <form method="get">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Search</h3>
              </div>


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
                    <label>Company Name</label>
                    <input type="text" name="company_name" placeholder="Company Name" class="form-control" value="{{ Request::get('company_name') }}">
                  </div>
                </div>

                  <div class="col-md-2">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{ Request::get('first_name') }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{ Request::get('last_name') }}">
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
                    <label>Country</label>
                    <input type="text" name="country" placeholder="Country" class="form-control" value="{{ Request::get('country') }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" placeholder="State" class="form-control" value="{{ Request::get('state') }}">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" placeholder="City" class="form-control" value="{{ Request::get('city') }}">
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
                    <label>Post Code</label>
                    <input type="text" name="postcode" placeholder="Post Code" class="form-control" value="{{ Request::get('postcode') }}">
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
                    <a href="{{ url('admin/order/list') }}" class="btn btn-success">Reset</a>
                  </div>
                </div>

              </div>

                

              </div>
            </div>

          </form>

              <!-- /.card-body -->

              <!-- /.card-header -->
              <div class= "card">
              <div class="card-header">
                <h3 class="card-title">Orders List</h3>
              </div>

              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr class="btn-primary">
                      <th>#</th>
                      <th>Name</th>
                      <th>Company Name</th>
                      <th>Country</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Post Code</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Discount Code</th>
                      <th>Discount Amount</th>
                      <th>Shipping Amount</th>
                      <th>Total amount</th>
                      <th>Payment Method</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->first_name}}  {{$value->last_name}}</td>
                    <td>{{$value->company_name}}</td>
                    <td>{{$value->country}}</td>
                    <td>{{$value->address_one}} <br /> {{$value->address_two}}</td>
                    <td>{{$value->city}}</td>
                    <td>{{$value->state}}</td>
                    <td>{{$value->postcode}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->discount_code}}</td>
                    <td>{{ number_format($value->discount_amount, 2) }}</td>
                    <td>{{ number_format($value->shipping_amount, 2) }}</td>
                    <td>{{ number_format($value->total_amount, 2) }}</td>
                    <td style="text-transform: capitalize;">{{$value->payment_method}}</td>
                    <td></td>
                    <td>{{ date('d-m-y h:i A', strtotime($value->created_at)) }}</td>
                    <td>
                      <a href="{{ url('admin/order/detail/'.$value->id) }}" class="btn btn-success"><i class="fas fa-eye"></i>Details</a>
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