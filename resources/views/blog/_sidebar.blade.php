<div class="sidebar">
    <style>
        .sidebar {
            background-color: #f8f9fa; /* Light background color */
            border-radius: 0.5rem; /* Rounded corners */
            padding: 1rem; /* Padding around the content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .widget-title {
            font-size: 1.5rem; /* Larger title font */
            margin-bottom: 1rem; /* Spacing below title */
            font-weight: bold; /* Bold titles */
        }

        .list-group-item {
            border: none; /* Remove border for cleaner look */
        }

        .posts-list .media {
            border-bottom: 1px solid #dee2e6; /* Divider between posts */
            padding-bottom: 10px; /* Padding below each post */
            margin-bottom: 15px; /* Spacing between posts */
        }

        .posts-list .media:last-child {
            border-bottom: none; /* Remove border for last item */
        }

        /* Image styling */
        .popular-post-image {
            width: 120px; /* Increased width */
            height: auto; /* Maintain aspect ratio */
            border-radius: 0.5rem; /* Rounded corners for images */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Subtle shadow for images */
        }

        .popular-post-title {
            font-size: 1rem; /* Increase title font size */
            font-weight: bold; /* Make title bold */
        }
    </style>

    <div class="widget widget-search">
        <h3 class="widget-title">Search</h3><!-- End .widget-title -->
        <form action="{{ url('blog') }}" method="get" class="search-form">
            <label for="ws" class="sr-only">Search in blog</label>
            <div class="input-group">
                <input type="text" class="form-control" value="{{ Request::get('search') }}" name="search" id="ws" placeholder="Search in blog">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                </div>
            </div>
        </form>
    </div><!-- End .widget -->

    <div class="widget widget-cats">
        <h3 class="widget-title">Categories</h3><!-- End .widget-title -->
        <ul class="list-group">
            @foreach($getBlogCategory as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('blog/category/'.$category->slug) }}">{{ $category->name }}</a>
                    <span class="badge badge-secondary">{{ $category->getCountBlog() }}</span>
                </li>
            @endforeach
        </ul>
    </div><!-- End .widget -->

    <div class="widget">
        <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->
        <ul class="posts-list">
            @foreach($getPopular as $valueP)
                <li class="media mb-3">
                    <a href="{{ url('blog/'.$valueP->slug) }}" class="mr-3">
                        <img src="{{ $valueP->getImage() }}" alt="{{ $valueP->title }}" class="popular-post-image">
                    </a>
                    <div class="media-body">
                        <span class="text-muted">{{ date('M d, Y', strtotime($valueP->created_at)) }}</span>
                        <h4 class="popular-post-title mt-0"><a href="{{ url('blog/'.$valueP->slug) }}">{{ $valueP->title }}</a></h4>
                    </div>
                </li>
            @endforeach
        </ul><!-- End .posts-list -->
    </div><!-- End .widget -->
</div><!-- End .sidebar -->
