@extends('layouts.app')

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $getPage->title }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    
    <div class="container-fluid">
        <div class="page-header page-header-big text-center" style="background-image: url('{{ $getPage->getImage() }}'); background-size: cover; background-position: center; padding: 100px 0; position: relative;">
            <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
            <h1 class="page-title text-white" style="position: relative; z-index: 1;">
                <i class="fas fa-info-circle"></i> {{ $getPage->title }}
                <span class="text-white"> Our Story & Mission</span>
            </h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    <div class="description" style="background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        {!! $getPage->description !!}
                    </div><!-- End .description -->
                </div><!-- End .col-lg-12 -->
            </div><!-- End .row -->

            <div class="mb-5"></div><!-- End .mb-4 -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection