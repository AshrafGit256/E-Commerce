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
                    <h1>System Setting</h1>
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
                            <h3 class="card-title">Edit System Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Website Name <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->website_name }}" name="website_name">
                                </div>

                                <div class="form-group">
                                    <label>Logo <span class="text-danger"></span></label>
                                    <input type="file" class="form-control" name="logo">

                                    @if(!empty($getRecord->getLogo()))
                                        <img src="{{ $getRecord->getLogo() }}" style = "width: 80px;">
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label>Favicon <span class="text-danger"></span></label>
                                    <input type="file" class="form-control" name="favicon">

                                    @if(!empty($getRecord->getFavicon()))
                                        <img src="{{ $getRecord->getFavicon() }}" style = "width: 50px">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Footer Description <span class="text-danger"></span></label>
                                    <textarea class="form-control" name="footer_description">{{ $getRecord->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Footer Payment Icon <span class="text-danger"></span></label>
                                    <input type="file" class="form-control" name="footer_payment_icon">

                                    @if(!empty($getRecord->getFooterPaymentIcon()))
                                        <img src="{{ $getRecord->getFooterPaymentIcon() }}" style = "width: 50px">
                                    @endif

                                </div>

                                <br>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address <span class="text-danger"></span></label>
                                            <textarea class="form-control" name="address">{{ $getRecord->address }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Working Hours <span class="text-danger"></span></label>
                                            <textarea class="form-control" name="working_hours">{{ $getRecord->working_hours }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone 1<span class="text-danger"></span> <i class="fas fa-phone-alt"></i></label>
                                            <input type="text" class="form-control" value="{{ $getRecord->phone }}" name="phone">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone 2 <i class="fas fa-phone"></i></label>
                                            <input type="text" class="form-control" value="{{ $getRecord->phone_two }}" name="phone_two">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Us Email <span class="text-danger"></span> <i class="fas fa-envelope"></i></label>
                                            <input type="email" class="form-control" value="{{ $getRecord->submit_email }}" name="submit_email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email 1<span class="text-danger"></span> <i class="fas fa-envelope"></i></label>
                                            <input type="email" class="form-control" value="{{ $getRecord->email }}" name="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email 2 <i class="fas fa-envelope"></i></label>
                                            <input type="email" class="form-control" value="{{ $getRecord->email_two }}" name="email_two">
                                        </div>
                                    </div>

                                    
                                </div>

                                <hr>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Facebook Link <span class="text-danger"></span> <i class="fab fa-facebook"></i></label>
                                            <input type="text" class="form-control" value="{{ $getRecord->facebook_link }}" name="facebook_link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Twitter Link <span class="text-danger"></span> <i class="fab fa-twitter"></i></label>
                                            <input type="text" class="form-control" value="{{ $getRecord->twitter_link }}" name="twitter_link">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Instagram Link <span class="text-danger"></span> <i class="fab fa-instagram"></i></label>
                                            <input type="text" class="form-control" value="{{ $getRecord->instagram_link }}" name="instagram_link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Youtube Link <span class="text-danger"></span> <i class="fab fa-youtube"></i></label>
                                            <input type="text" class="form-control" value="{{ $getRecord->youtube_link }}" name="youtube_link">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pinterest Link <span class="text-danger"></span> <i class="fab fa-pinterest"></i></label>
                                            <input type="text" class="form-control" value="{{ $getRecord->pinterest_link }}" name="pinterest_link">
                                        </div>
                                    </div>
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
