@extends('admin.layouts.app')

@section('style')
<!-- Include Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Include Bootstrap CSS if not included in your main layout -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home Setting</h1>
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
                @include('admin.layouts._message')
                    <!-- jquery validation -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Edit Home Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Trendy Product Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->trendy_product_title }}" name="trendy_product_title">
                                </div>

                                <div class="form-group">
                                    <label>Shop By Category Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->shop_by_category_title }}" name="shop_by_category_title">
                                </div>

                                <div class="form-group">
                                    <label>Recent Arrival Title<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->recent_arrival_title }}" name="recent_arrival_title">
                                </div>

                                <div class="form-group">
                                    <label>Blog Title<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->blog_title }}" name="blog_title">
                                </div>

                                <div class="form-group">
                                    <label>Payment Delivery Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->payment_delivery_title }}" name="payment_delivery_title">
                                </div>

                                <div class="form-group">
                                    <label>Payment Delivery Description<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->payment_delivery_description }}" name="payment_delivery_description">
                                </div>

                                <div class="form-group">
                                    <label>Payment Delivery Image<span class="text-danger"></span></label>
                                    <input type="file" class="form-control" name="payment_delivery_image">
                                    
                                    @if(!empty($getRecord->getPaymentImage()))
                                        <img src="{{ $getRecord->getPaymentImage() }}" style = "width: 80px;">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Refund Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->refund_title }}" name="refund_title">
                                </div>

                                <div class="form-group">
                                    <label>Refund Description <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->refund_description }}" name="refund_description">
                                </div>

                                <div class="form-group">
                                    <label>Refund Image <span class="text-danger"></span></label>
                                    <input type="file" class="form-control" name="refund_image">

                                    @if(!empty($getRecord->getRefundImage()))
                                        <img src="{{ $getRecord->getRefundImage() }}" style = "width: 80px;">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Support Title<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->support_title }}" name="support_title">
                                </div>

                                <div class="form-group">
                                    <label>Support Description <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->support_description }}" name="support_description">
                                </div>

                                <div class="form-group">
                                    <label>Support Image <span class="text-danger"></span></label>
                                    <input type="file" class="form-control" name="support_image">

                                    @if(!empty($getRecord->getSupportImage()))
                                        <img src="{{ $getRecord->getSupportImage() }}" style = "width: 80px;">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Signup Title <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->signup_title }}" name="signup_title">
                                </div>

                                <div class="form-group">
                                    <label>Signup Description <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->signup_description }}" name="signup_description">
                                </div>

                                <div class="form-group">
                                    <label>Signup Image <span class="text-danger"></span></label>
                                    <input type="file" class="form-control" name="signup_image">

                                    @if(!empty($getRecord->getSignupImage()))
                                        <img src="{{ $getRecord->getSignupImage() }}" alt="Signup Image" style="width: 80px;">
                                    @endif
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
@endsection

@section('script')
@endsection
