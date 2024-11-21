@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="position: relative; background-image: url('/assets/images/about-header-bg.jpg'); background-size: cover; background-position: center; height: 150px;">

        <!-- Overlay to reduce brightness -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6);"></div>

        <!-- Text container on top of the overlay -->
        <div class="container-fluid" style="position: relative; z-index: 1;">
            <h1 class="page-title" style="color: white;">Change Password</h1>
        </div><!-- End .container -->

    </div><!-- End .page-header -->


    <div class="page-content">
        <div class="dashboard">
            <div class="container-fluid">
                <br />
                <div class="row">
                    @include('user._sidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">

                            @include('layouts._message')
                            <form action="" method="post">
                                {{ csrf_field() }}

                                <label>Old Password *</label>
                                <input type="password" name="old_password" class="form-control" required>



                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>New password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Confirm Password *</label>
                                        <input type="password" name="cpassword" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">

                                </div><!-- End .row -->

                                <button type="submit" style="width: 200px;" class="btn btn-outline-primary-2 btn-order btn-block">
                                    Update Password
                                </button>
                            </form>
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection


@section('script')

@endsection