@extends('layouts.app')

@section('style')
    <style type="text/css">
        .box-btn {
            padding: 15px; 
            text-align: center; 
            border-radius: 8px; 
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 2px 6px rgba(0, 0, 0, .2); 
            transition: all 0.3s ease;
            background-color: #f7f7f7;
            min-height: 130px;
        }

        .box-btn:hover {
            box-shadow: 0 0 1px rgba(0, 0, 0, .2), 0 5px 10px rgba(0, 0, 0, .3);
        }

        .box-btn .icon {
            font-size: 28px; 
            margin-bottom: 8px; 
            color: #fff;
        }

        /* Custom colors for different order types */
        .box-total { background-color: #007bff; }
        .box-today { background-color: #28a745; }
        .box-amount { background-color: #ffc107; }
        .box-in-progress { background-color: #17a2b8; }
        .box-pending { background-color: #fd7e14; }
        .box-completed { background-color: #6f42c1; }
        .box-cancelled { background-color: #dc3545; }
        .box-delivered { background-color: #20c997; } /* Delivered Orders box */
        
        .box-btn h3, .box-btn p {
            color: white;
        }

        .box-btn h3 {
            font-size: 20px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .box-btn p {
            font-size: 14px;
        }

        .icon {
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="position: relative; background-image: url('/assets/images/about-header-bg.jpg'); background-size: cover; background-position: center; height: 150px;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6);"></div>
        <div class="container-fluid" style="position: relative; z-index: 1;">
            <h1 class="page-title" style="color: white;">Dashboard</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container-fluid">
                <br/>
                <div class="row">
                    @include('user._sidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="row">
                                <!-- Total Orders -->
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn box-total">
                                        <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                                        <h3>{{ $TotalOrder }}</h3>
                                        <p>Total Orders</p>
                                    </div>
                                </div>

                                <!-- Today's Orders -->
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn box-today">
                                        <div class="icon"><i class="fa fa-calendar-day"></i></div>
                                        <h3>{{ $TotalTodayOrder }}</h3>
                                        <p>Today's Orders</p>
                                    </div>
                                </div>

                                <!-- Total Amount -->
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn box-amount">
                                        <div class="icon"><i class="fa fa-coins"></i></div>
                                        <h3>${{ number_format($TotalAmount, 2) }}</h3>
                                        <p>Total Amount</p>
                                    </div>
                                </div>

                                <!-- Today's Amount -->
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn box-in-progress">
                                        <div class="icon"><i class="fa fa-wallet"></i></div>
                                        <h3>${{ number_format($TotalTodayAmount, 2) }}</h3>
                                        <p>Today's Amount</p>
                                    </div>
                                </div>

                                <!-- Pending Orders -->
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn box-pending">
                                        <div class="icon"><i class="fa fa-hourglass-half"></i></div>
                                        <h3>{{ $TotalPending }}</h3>
                                        <p>Pending Orders</p>
                                    </div>
                                </div>

                                <!-- In Progress Orders -->
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn box-in-progress">
                                        <div class="icon"><i class="fa fa-tasks"></i></div>
                                        <h3>{{ $TotalInProgress }}</h3>
                                        <p>In Progress Orders</p>
                                    </div>
                                </div>

                                <!-- Completed Orders -->
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn box-completed">
                                        <div class="icon"><i class="fa fa-check-circle"></i></div>
                                        <h3>{{ $TotalCompleted }}</h3>
                                        <p>Completed Orders</p>
                                    </div>
                                </div>

                                <!-- Cancelled Orders -->
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn box-cancelled">
                                        <div class="icon"><i class="fa fa-times-circle"></i></div>
                                        <h3>{{ $TotalCancelled }}</h3>
                                        <p>Cancelled Orders</p>
                                    </div>
                                </div>

                                <!-- Delivered Orders -->
                                
                            </div><!-- End .row -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
