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
                    <h1>SMTP Setting</h1>
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
                                    <label>Website Name<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->name }}" name="name">
                                </div>

                                <div class="form-group">
                                    <label>Mail Mailer<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->mail_mailer }}" name="mail_mailer">
                                </div>

                                <div class="form-group">
                                    <label>Mail Host<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->mail_host	 }}" name="mail_host">
                                </div>

                                <div class="form-group">
                                    <label>Mail Port<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->mail_port	 }}" name="mail_port">
                                </div>

                                <div class="form-group">
                                    <label>Mail Username<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->mail_username }}" name="mail_username">
                                </div>

                                <div class="form-group">
                                    <label>Mail Password<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->mail_password }}" name="mail_password">
                                </div>

                                <div class="form-group">
                                    <label>Mail Encryption<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->mail_encryption }}" name="mail_encryption">
                                </div>

                                <div class="form-group">
                                    <label>Mail From Address<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" value="{{ $getRecord->mail_from_address }}" name="mail_from_address">
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
