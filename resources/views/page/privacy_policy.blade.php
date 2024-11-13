@extends('layouts.app')

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}" class="text-primary">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $getPage->title }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="container-fluid">
        <div class="page-header page-header-big text-center" style="background-image: url('{{ $getPage->getImage() }}'); background-size: cover; background-position: center; padding: 120px 0; position: relative;">
            <div class="overlay" style="background-color: rgba(0, 0, 0, 0.6); position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
            <h1 class="page-title text-white" style="position: relative; z-index: 1; font-size: 48px; font-weight: 600;">
                <i class="fas fa-info-circle"></i> {{ $getPage->title }}
                <span class="d-block text-white" style="font-size: 22px;">Our Story & Mission</span>
            </h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    <div class="description" style="background-color: #f9f9f9; padding: 40px; border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);">
                        <h2 class="text-dark mb-4" style="font-size: 32px; font-weight: 500;">
                            <i class="fas fa-book-open"></i> Privacy Policy
                        </h2>
                        {!! $getPage->description !!}
                    </div><!-- End .description -->
                </div><!-- End .col-lg-12 -->
            </div><!-- End .row -->

            <div class="spacer" style="height: 50px;"></div><!-- End .spacer -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
