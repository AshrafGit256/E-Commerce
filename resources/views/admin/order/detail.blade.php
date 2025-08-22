@extends('admin.layouts.app')

@section('style')
<!-- Add some custom CSS for better styling -->
<style>
    .form-group {
        background-color: #adb5bd;
        /* Light grey background */
        border-radius: 5px;
        padding: 15px;
        /* Increased padding for better spacing */
        margin-bottom: 15px;
        /* Increased margin for better spacing */
        border: 1px solid #dee2e6;
        /* Light border */
        transition: background-color 0.3s;
        /* Smooth background change on hover */
    }

    .form-group label {
        font-size: 1.1rem;
        /* Slightly larger font */
        font-weight: bold;
        color: #343a40;
    }

    .form-group span {
        font-size: 1rem;
        /* Consistent font size */
        color: #495057;
        /* Darker text color for better contrast */
    }

    .form-group i {
        margin-right: 10px;
        color: #28a745;
        /* Darker text color for better contrast */
    }

    .content-header h1 {
        font-size: 28px;
        font-weight: bold;
        color: #fff;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Add shadow for modern look */
    }

    .card-header {
        background-color: #007bff;
        /* Primary color for header */
        color: white;
        padding: 15px;
    }

    .card-header1 {
        color: white;
        background-color: #343a40;
        padding: 15px;
    }

    .btn-primary,
    .btn-danger {
        font-weight: bold;
        border-radius: 5px;
        /* Rounded button corners */
    }

    .btn-group {
        margin-top: 15px;
        /* Space above button group */
    }

    .text-success {
        color: #28a745;
        /* Green color for success */
    }

    .text-danger {
        color: #dc3545;
        /* Red color for danger */
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
                    <h1>Order Detail</h1>
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
                            <h3 class="card-title">Order Information</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-id-badge"></i> ID: <span>{{ $getRecord->id }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fas fa-id-badge"></i> Order Number: <span>{{ $getRecord->order_number }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fas fa-receipt"></i> Transaction ID: <span>{{ $getRecord->transaction_id }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-flag"></i> Country: <span>{{ $getRecord->country }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-phone"></i> Phone: <span>{{ $getRecord->phone }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-envelope"></i> Email: <span>{{ $getRecord->email }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-percentage"></i> Discount Code: <span>{{ $getRecord->discount_code }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-plane"></i> Shipping Name: <span>{{ $getRecord->getShipping->name }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fas fa-plane"></i> Shipping Amount: <span>{{ number_format($getRecord->shipping_amount, 2) }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fas fa-dollar-sign"></i> Total Amount: <span>{{ number_format($getRecord->total_amount, 2) }}</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> Name: <span>{{ $getRecord->first_name }} {{ $getRecord->last_name }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-building"></i> Company Name: <span>{{ $getRecord->company_name }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-home"></i> Address: <span>{{ $getRecord->address_one }}, {{ $getRecord->address_two }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-city"></i> City: <span>{{ $getRecord->city }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-map-marker-alt"></i> State: <span>{{ $getRecord->state }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-envelope"></i> Post Code: <span>{{ $getRecord->postcode }}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fas fa-credit-card"></i> Payment Method: <span>{{ $getRecord->payment_method }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <i class="fas fa-info-circle"></i> Status:

                                            @if($getRecord->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                            @elseif($getRecord->status == 1)
                                            <span class="badge badge-info">In Progress</span>
                                            @elseif($getRecord->status == 2)
                                            <span class="badge badge-primary">Delivered</span>
                                            @elseif($getRecord->status == 3)
                                            <span class="badge badge-success">Completed</span>
                                            @elseif($getRecord->status == 4)
                                            <span class="badge badge-danger">Cancelled</span>
                                            @endif
                                            
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fas fa-sticky-note"></i> Note: <span>{{ $getRecord->note }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fas fa-calendar-alt"></i> Created Date: <span>{{ date('d-m-Y h:i A', strtotime($getRecord->created_at)) }}</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-money-bill-wave"></i> Discount Amount: <span>{{ number_format($getRecord->discount_amount, 2) }}</span></label>
                            </div>

                           

                            

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="col-md-12">
        <div class="card">
            <div class="card-header1">
                <h3 class="card-title">Product Details</h3>
            </div>

            @include('admin.layouts._message')
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                    <thead>
                        <tr class="btn-success">
                            <th>Image</th>
                            <th>Quick link</th>
                            <th>Product Name</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Size Name</th>
                            <th>Color Name</th>
                            <th>Size amount</th>
                            <th>Total amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getRecord -> getItem as $item)

                        @php
                        $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id);
                        @endphp
                        <tr>
                            <td>
                                <img style="width: 100px; height:100px;" src="{{ $getProductImage->get_image() }}">
                            </td>
                            <td>
                                <a target="_blank" href="{{ url($item->getProduct->slug) }}">{{ $item->getProduct->title }}</a>
                            </td>
                            <td>{{ $item->getProduct->title }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ $item->size_name }}</td>
                            <td>{{ $item->color_name }}</td>
                            
                            <td>{{ $item->size_amount }}</td>
                            
                            <td>${{ $item->quantity * $item->price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip(); // Initialize tooltips
    });
</script>
@endsection