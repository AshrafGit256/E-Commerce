@extends('layouts.app')

@section('content')

<main class="main">
        	<div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">{{ $getCategory->name }}</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active"><a href="#">{{ $getCategory->name }}</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <div class="entry-container max-col-2" data-layout="fitRows">
                                @foreach($getBlog as $value)
                                    <div class="entry-item col-sm-6">
                                        <article class="entry entry-grid">
                                            <figure class="entry-media" style="border-radius: 5%;">
                                                <a href="{{ url('blog/'.$value->slug) }}">
                                                    <img src="{{ $value->getImage() }}" style="height: 424px; width: 424px; border-radius: 5%;" alt="{{ $value->title }}">
                                                </a>
                                            </figure><!-- End .entry-media -->

                                            <div class="entry-body">
                                                <div class="entry-meta">
                                                    <a href="#">{{ date('M d, Y', strtotime($value->created_at))}}</a>
                                                    <span class="meta-separator">|</span>
                                                    <a href="#">{{ $value->getCommentCount() }} Comments</a>
                                                </div><!-- End .entry-meta -->

                                                <h2 class="entry-title">
                                                    <a href="{{ url('blog/'.$value->slug) }}">{{ $value->title }}</a>
                                                </h2><!-- End .entry-title -->

                                                @if(!empty($value->getCategory))
                                                    <div class="entry-cats">
                                                    in <a href="{{ url('blog/category/'.$value->getCategory->slug) }}">{{ $value->getCategory->name }}</a>
                                                    </div>
                                                @endif

                                                <div class="entry-content">
                                                    <p>{{ $value->short_description }}</p>
                                                    <a href="{{ url('blog/'.$value->slug) }}" class="read-more">Continue Reading</a>
                                                </div>

                                            </div><!-- End .entry-body -->
                                        </article><!-- End .entry -->
                                    </div><!-- End .entry-item -->
                                @endforeach
                            </div><!-- End .entry-container -->

                            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                            <div style="padding: 10px; float:right;">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($getBlog->onFirstPage())
                                            <li class="page-item disabled">
                                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link page-link-prev" href="{{ $getBlog->previousPageUrl() }}" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Page Number Links --}}
                                        @for ($i = 1; $i <= $getBlog->lastPage(); $i++)
                                            <li class="page-item {{ $getBlog->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $getBlog->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        {{-- Next Page Link --}}
                                        @if ($getBlog->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link page-link-next" href="{{ $getBlog->nextPageUrl() }}" aria-label="Next">
                                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class="page-link page-link-next" href="#" aria-label="Next" tabindex="-1" aria-disabled="true">
                                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>

                		</div><!-- End .col-lg-9 -->

                		<aside class="col-lg-3">
                			@include('blog._sidebar')
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection    

@section('script')

@endsection    