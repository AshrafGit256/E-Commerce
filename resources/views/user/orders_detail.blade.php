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
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 0;
    }

    .page-header h1 {
        position: relative;
        z-index: 100;
        font-size: 46px;
        font-weight: normal;
        color: #fff;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.5rem;
        /* Uniform padding for all cells */
        vertical-align: middle;
        text-align: left;
        font-size: 1.9rem;
        /* Increase the font size for both headers and cells */
    }

    .table th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        text-align: center;
        /* Center-align header text */
        border: 1px solid #ddd;
    }

    .table td {
        border: 1px solid #ddd;
        text-align: center;
        /* Slightly smaller text */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f7f7f7;
        /* Subtle alternating row color */
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #fff;
    }

    .table img {
        border-radius: 4px;
        /* Slightly rounded edges for images */
        max-height: 80px;
        /* Reduce image height */
        object-fit: cover;
        /* Maintain aspect ratio */
    }

    /* Formal Header Styling */
    .table th:first-child,
    .table td:first-child {
        text-align: center;
        /* Center-align the first column (images) */
    }

    /* Optional hover effect for table rows */
    .table tbody tr:hover {
        background-color: #e9ecef;
        /* Light hover effect */
    }

    .btn-success {
        display: inline-flex;
        align-items: center;
    }

    .btn-success i {
        margin-right: 5px;
    }

    .pagination {
        justify-content: flex-end;
    }
</style>
@endsection

@section('content')
<main class="main">
    <!-- Page Header -->
    <div class="page-header text-center">
        <h1 class="page-title">Order Details</h1>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="dashboard">
            <div class="container-fluid">
                <br />
                <div class="row">
                    @include('user._sidebar')

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content mt-3">
                            @include('admin.layouts._message')
                            <div class="card-body">

                                <div class="row">

                                    <!-- Order Details -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-id-badge"></i> Order Number: <span>{{ $getRecord->order_number }}</span></label>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fas fa-percentage"></i> Discount Code: <span>{{ $getRecord->discount_code }}</span></label>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fas fa-dollar-sign"></i> Total Amount: <span>{{ number_format($getRecord->total_amount, 2) }}</span></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Status:
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
                                    </div>
                                    <!-- Customer Details -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user"></i> Name: <span>{{ $getRecord->first_name }} {{ $getRecord->last_name }}</span></label>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fas fa-home"></i> Address: <span>{{ $getRecord->address_one }}, {{ $getRecord->address_two }}</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details Table -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header1 mt-5">
                                <h3 class="card-title">Product Details</h3>
                            </div>

                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Quick Link</th>
                                            <th>Product Name</th>
                                            <th>QTY</th>
                                            <th>Price</th>

                                            <th>Size</th>
                                            

                                            
                                            <th>Color</th>
                                            
                                            
                                            <th>Total</th>

                                            @if($getRecord->status == 2 || $getRecord->status == 3)
                                            <th>Reviews</th>
                                            @endif

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getRecord->getItem as $item)
                                        @php $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id); @endphp
                                        <tr>
                                            <td style="place-items: center;">
                                                <img style="width: 80px; place-items:center;" src="{{ $getProductImage->get_image() }}">
                                            </td>
                                            <td style="max-width:300px;">
                                                <a target="_blank" href="{{ url($item->getProduct->slug) }}">{{ $item->getProduct->title }}</a>
                                            </td>
                                            <td>{{ $item->getProduct->title }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>

                                            
                                            <td>{{ $item->size_name }}</td>
                                            
                                            <td>{{ $item->color_name }}</td>

                                            <!-- @if(!empty($item->color_name))
                                            <td>{{ $item->color_name }}</td>
                                            @endif -->

                                            <td>{{ $item->quantity * $item->price }}</td>

                                            @if($getRecord->status == 2 || $getRecord->status == 3)
                                            <td>
                                                @php
                                                    $getReview = $item->getReview($item->getProduct->id, $getRecord->id);
                                                @endphp
                                                

                                                @if(!empty($getReview))
                                                    <b>Rating :</b> {{ $getReview->rating }} <br>
                                                    <b>Review :</b> {{ $getReview->review }} <br>
                                                @else
                                                <button class="btn btn-primary makeReview" id="{{ $item->getProduct->id }}" data-order="{{ $getRecord->id }}">Make Review</button>
                                                @endif

                                            </td>
                                            @endif

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="MakeReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Make Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('user/make-review') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" required id="getProductId" name="product_id">
                <input type="hidden" required id="getOrderId" name="order_id">
                <div class="modal-body" style="padding:20px;">
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label>How many ratings? <span style="color: red;">*</span></label>
                        <select class="form-control" required name="rating">
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Review <span style="color: red;">*</span> </label>
                        <textarea class="form-control" required name="review">

                        </textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $('body').delegate('.makeReview', 'click', function() {
        var product_id = $(this).attr('id');
        var order_id = $(this).attr('data_order');

        $('#getProductId').val(product_id);
        $('#getOrderId').val(order_id);

        $('#MakeReviewModal').modal('show');
    });
</script>
@endsection