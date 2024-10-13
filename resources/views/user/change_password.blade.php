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
    <div class="container" style="position: relative; z-index: 1;">
        <h1 class="page-title" style="color: white;">Change Password</h1>
    </div><!-- End .container -->
    
</div><!-- End .page-header -->


            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
                        <br/>
	                	<div class="row">
                            @include('user._sidebar')
	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    	<p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>) 
								    	<br>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
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
