@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}"
    @endsection

    @section('content')

    <main class="main">
<div class="page-header text-center" style="position: relative; background-image: url('/assets/images/about-header-bg.jpg'); background-size: cover; background-position: center; height: 150px;">

    <!-- Overlay to reduce brightness -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6);"></div>

    <!-- Text container on top of the overlay -->
    <div class="container-fluid" style="position: relative; z-index: 1;">
        <h1 class="page-title" style="color: white;">Edit Profile</h1>
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

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name *</label>
                                    <input type="text" name="first_name" value="{{ $getRecord->name}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Last Name *</label>
                                    <input type="text" name="last_name" value="{{ $getRecord->last_name}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Email address *</label>
                            <input type="email" name="email" value="{{ $getRecord->email}}" class="form-control" readonly>

                            <label>Company Name (Optional)</label>
                            <input type="text" name="company_name" value="{{ $getRecord->company_name}}" class="form-control">

                            <label>Country *</label>
                            <input type="text" name="country" value="{{ $getRecord->country}}" class="form-control" required>

                            <label>Street address *</label>
                            <input type="text" name="address_one" class="form-control" value="{{ $getRecord->address_one}}" placeholder="House number and Street name" required>
                            <input type="text" name="address_two" class="form-control" value="{{ $getRecord->address_two}}" placeholder="Appartments, suite, unit etc ..." required>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <input type="text" name="city" value="{{ $getRecord->city}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>State *</label>
                                    <input type="text" name="state" value="{{ $getRecord->state}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP *</label>
                                    <input type="text" name="postcode" value="{{ $getRecord->postcode}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone *</label>
                                    <input type="tel" name="phone" value="{{ $getRecord->phone}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <button type="submit" style="width: 200px; margin-left: 470px;" class="btn btn-outline-primary-2 btn-order btn-block">
                                Submit
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