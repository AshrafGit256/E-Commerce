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
            <h1>Orders List</h1>
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
                <h3 class="card-title">Orders List</h3>
              </div>

              @include('admin.layouts._message')
              <!-- /.card-header -->
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
                    <td>{{$value->address_one}} <br> {{$value->address_two}}</td>
                    <td>{{$value->city}}</td>
                    <td>{{$value->state}}</td>
                    <td>{{$value->postcode}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->discount_code}}</td>
                    <td>{{$value->discount_amount}}</td>
                    <td>{{$value->shipping_amount}}</td>
                    <td>{{$value->total_amount}}</td>
                    <td>{{$value->payment_method}}</td>
                    <td>{{$value->Status}}</td>
                    <td>{{ date('d-m-y h:i A', strtotime($value->created_at)) }}</td>
                    <td>
                      
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