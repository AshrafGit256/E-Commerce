@extends('layouts.app')

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg'); background-size: cover; background-position: center; padding: 60px 0;">
        <div class="container-fluid">
            <h1 class="page-title" style="font-size: 42px; font-weight: 700; color: #fff; letter-spacing: 2px;">{{ $getBlog->title }}</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container-fluid">
            @include('admin.layouts._message')
            <ol class="breadcrumb" style="background-color: #f1f1f1; padding: 15px; border-radius: 5px;">
                <li class="breadcrumb-item"><a href="{{ url('') }}" style="color: #555;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('blog') }}" style="color: #555;">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #000;">{{ $getBlog->title }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <!-- Blog Article -->
                    <article class="entry single-entry" style="border-bottom: 1px solid #ddd; padding-bottom: 40px; margin-bottom: 40px;">
                        <figure class="entry-media">
                            <img src="{{ $getBlog->getImage() }}" alt="{{ $getBlog->title }}" style="width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                        </figure><!-- End .entry-media -->

                        <div class="entry-body" style="padding: 30px 0;">
                            <div class="entry-meta" style="font-size: 14px; color: #888; margin-bottom: 15px;">
                                <span><i class="icon-calendar"></i> {{ date('M d, Y h:i A', strtotime($getBlog->created_at)) }}</span>
                                <span class="meta-separator">|</span>
                                <span><i class="icon-comment"></i> {{ $getBlog->getCommentCount() }} Comments</span>
                                @if(!empty($getBlog->getCategory))
                                <span class="meta-separator">|</span>
                                <a href="{{ url('blog/category/'.$getBlog->getCategory->slug) }}" class="category-link" style="color: #007bff;">{{ $getBlog->getCategory->name }}</a>
                                @endif
                            </div><!-- End .entry-meta -->

                            <div class="entry-content" style="line-height: 1.8; font-size: 18px; color: #333;">
                                {!! $getBlog->description !!}
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <!-- Related Posts -->
                    @if(!empty($getRelatedPost->count))
                    <div class="related-posts mt-5">
                        <h3 class="title" style="font-size: 26px; font-weight: 600; margin-bottom: 30px; border-bottom: 2px solid #ddd; padding-bottom: 10px;">Related Posts</h3>
                        <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>
                            @foreach($getRelatedPost as $related)
                            <article class="entry entry-grid" style="background-color: #f9f9f9; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);">
                                <figure class="entry-media">
                                    <a href="{{ url('blog/'.$related->slug) }}">
                                        <img src="{{ $related->getImage() }}" alt="{{ $related->title }}" style="width: 100%; height: auto;">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body" style="padding: 20px;">
                                    <div class="entry-meta" style="font-size: 14px; color: #888;">
                                        <span>{{ date('M d, Y', strtotime($related->created_at)) }}</span>
                                        <span class="meta-separator">|</span>
                                        <span>{{ $related->getCommentCount() }} Comments</span>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title" style="font-size: 20px; margin-top: 10px;">
                                        <a href="{{ url('blog/'.$related->slug) }}" style="color: #007bff;">{{ $related->title }}</a>
                                    </h2>

                                    @if(!empty($related->getCategory))
                                    <div class="entry-cats">
                                        <a href="{{ url('blog/category/'.$related->getCategory->slug) }}" style="color: #555;">{{ $related->getCategory->name }}</a>
                                    </div><!-- End .entry-cats -->
                                    @endif
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .related-posts -->
                    @endif

                    <!-- Comments Section -->
                    <div class="comments mt-5">
                        <h3 class="title" style="font-size: 26px; font-weight: 600;">{{ $getBlog->getCommentCount() }} Comments</h3>

                        <ul class="comment-list">
                            @foreach($getBlog->getComment as $comment)
                            <li class="comment-item" style="border-bottom: 1px solid #ddd; padding-bottom: 20px; margin-bottom: 20px;">
                                <div class="comment-body">
                                    <div class="comment-user">
                                        <h4 class="comment-author"><a href="#" style="color: #007bff;">{{ $comment->getUser->name }}</a></h4>
                                        <span class="comment-date" style="font-size: 14px; color: #888;">{{ date('M d, Y h:i A', strtotime($comment->created_at)) }}</span>
                                    </div><!-- End .comment-user -->

                                    <div class="comment-content" style="font-size: 16px; line-height: 1.6; margin-top: 10px;">
                                        <p>{{ $comment->comment }}</p>
                                    </div><!-- End .comment-content -->
                                </div><!-- End .comment-body -->
                            </li>
                            @endforeach
                        </ul><!-- End .comment-list -->
                    </div><!-- End .comments -->

                    <!-- Leave a Comment -->
                    <div class="reply mt-5">
                        <h3 class="title" style="font-size: 24px; font-weight: 600; margin-bottom: 20px;">Leave A Comment</h3>

                        <form action="{{ url('blog/submit_comment') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="blog_id" value="{{ $getBlog->id }}">
                            <textarea name="comment" required id="reply-message" cols="30" rows="4" class="form-control" placeholder="Comment *" style="border-radius: 5px; margin-bottom: 15px;"></textarea>

                            @if(!empty(Auth::check()))
                            <button type="submit" class="btn btn-outline-primary-2" style="padding: 10px 25px; font-size: 16px;">
                                <span>POST COMMENT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                            @else
                            <a href="#signin-modal" data-toggle="modal" class="btn btn-outline-primary-2" style="padding: 10px 25px; font-size: 16px;">
                                <span>POST COMMENT</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                            @endif
                        </form>
                    </div><!-- End .reply -->

                </div><!-- End .col-lg-9 -->

                <!-- Sidebar -->
                <aside class="col-lg-3">
                    @include('blog._sidebar')
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>

@endsection

@section('script')
<!-- Add any custom scripts here -->
@endsection
