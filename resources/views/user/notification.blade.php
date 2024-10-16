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
            z-index: 1;
            font-size: 36px;
            font-weight: bold;
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
    </style>
@endsection

@section('content')

<main class="main">
    <!-- Page Header -->
    <div class="page-header text-center">
        <h1 class="page-title">Notifications</h1>
    </div><!-- End .page-header -->

    <!-- Page Content -->
    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br/>
                <div class="row">
                    @include('user._sidebar')

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <!-- Orders Table -->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td style="padding: 10px;">
                                            <a style="color: #000; {{ empty($value->is_read) ? 'font-weight: bold;' : '' }}" href="{{ $value->url }}?notify_id={{ $value->id }}">
                                                <i class="fas fa-bell notification-icon"></i> <!-- Notification icon -->
                                                {{ $value->message }}
                                            </a>
                                            <div>
                                                <small>
                                                {{ \Carbon\Carbon::parse($value->created_at)->format('F j, Y h:i A') }}
                                                </small>
                                            </div>
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
