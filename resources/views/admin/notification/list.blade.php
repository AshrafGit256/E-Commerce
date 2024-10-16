@extends('admin.layouts.app')

@section('style')
<!-- Additional styles for making the page look more professional -->
<style>
    .card {
        display: flex;
        flex-direction: column;
        height: 100%; /* Make card full height */
    }

    .card-header {
        background-color: #007bff;
        color: white;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .btn-primary, .btn-danger, .btn-success {
        padding: 8px 16px;
        border-radius: 5px;
    }

    .btn-primary i, .btn-danger i, .btn-success i {
        margin-right: 5px;
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: left; /* Change to left alignment */
    }

    .table th {
        text-align: left; /* Ensure header is also left-aligned */
        font-weight: bold;
    }

    .pagination {
        margin: 0;
    }

    .form-group label {
        font-weight: 600;
    }

    a:hover {
        color: #0056b3; /* Darker blue on hover */
    }

    .notification-icon {
        margin-right: 10px;
        color: #007bff; /* Notification icon color */
    }

    .card-body {
        flex-grow: 1; /* Allow card body to grow and fill space */
        padding: 0; /* Remove default padding for the body */
    }

    .card-footer {
        background-color: #f9f9f9;
        border-top: 1px solid #e0e0e0;
        padding: 10px;
        text-align: right;
    }

    .pagination-wrapper {
        padding: 10px; 
        float: right;
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
                    <h1>Notifications</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- Empty right column for any future actions/buttons -->
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('admin.layouts._message')

                        <!-- Card Body -->
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td>
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

                            <!-- Pagination -->
                            <div class="pagination-wrapper">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer">
                            <small>Showing {{ $getRecord->count() }} notifications</small>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<!-- Add any additional scripts if needed -->
@endsection
