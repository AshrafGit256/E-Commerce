@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
    <style>
        .page-header {
            position: relative;
            background-image: url('/assets/images/about-header-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        /* Overlay to reduce brightness */
        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }

        .page-header h1 {
            position: relative;
            z-index: 100;
            font-size: 36px;
            font-weight: bold;
            color: #f9f9f9;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-success {
            display: inline-flex;
            align-items: center;
        }

        .btn-success i {
            margin-right: 5px;
        }

        /* Pagination */
        .pagination {
            justify-content: flex-end;
        }

        .page-header {
            color: #f9f9f9;
        }
    </style>
@endsection

@section('content')

<main class="main">
    <!-- Page Header -->
    <div class="page-header text-center">
        <h1 class="page-title">Orders</h1>
    </div><!-- End .page-header -->

    <!-- Page Content -->
    <div class="page-content">
        <div class="dashboard">
            <div class="container-fluid">
                <br/>
                <div class="row">
                    @include('user._sidebar')

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <!-- Orders Table -->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Number</th>
                                            <th>Total Amount</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->order_number }}</td>
                                            <td>${{ number_format($value->total_amount, 2) }}</td>
                                            <td class="text-capitalize">{{ $value->payment_method }}</td>
                                            <td>
                                                @if($value->status == 0)
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($value->status == 1)
                                                    <span class="badge badge-info">In Progress</span>
                                                @elseif($value->status == 2)
                                                    <span class="badge badge-primary">Delivered</span>
                                                @elseif($value->status == 3)
                                                    <span class="badge badge-success">Completed</span>
                                                @elseif($value->status == 4)
                                                    <span class="badge badge-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('user/orders/detail/'.$value->id) }}" class="btn btn-success">
                                                    <i class="fas fa-eye"></i> Details
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- End .table-responsive -->

                            <!-- Pagination -->
                            <div class="d-flex justify-content-end mt-4">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div><!-- End .tab-content -->
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection

@section('script')
    <!-- Add any additional scripts if needed -->
@endsection
