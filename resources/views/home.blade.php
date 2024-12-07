@extends('layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;500&family=Lora:wght@400;700&family=Montserrat:wght@400;700&family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
@section('content')

<main class="main">
    <div class="intro-section bg-lighter pt-5 pb-6">
        <div class="intro-section bg-lighter pt-5 pb-6">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                            <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                "nav": false, 
                "responsive": {
                    "768": {
                        "nav": true
                    }
                }
            }'>
                                @foreach($getSlider as $slider)
                                @if(!empty($slider->getImage()))
                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)" srcset="{{ $slider->getImage() }}">
                                            <img src="{{ $slider->getImage() }}" alt="Image Desc">
                                        </picture>
                                    </figure>

                                    <div class="intro-content">
                                        <h1 class="intro-title">
                                            {!! $slider->title !!}
                                        </h1>
                                        @if(!empty($slider->button_link) && !empty($slider->button_name))
                                        <a href="{{ $slider->button_link }}" class="btn btn-outline-white">
                                            <span>{{ $slider->button_name }}</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <span class="slider-loader"></span>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12 mb-2">
                                <div class="banner banner-display">
                                    <a href="#">
                                        <img src="assets/images/banners/home/intro/banner-1.jpg" alt="Banner">
                                    </a>
                                    <div class="banner-content">
                                        <h4 class="banner-subtitle text-darkwhite"><a href="#">Clearance</a></h4>
                                        <h3 class="banner-title text-white"><a href="#">Chairs & Chaises <br>Up to 40% off</a></h3>
                                        <a href="#" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="banner banner-display">
                                    <a href="#">
                                        <img src="assets/images/banners/home/intro/banner-2.jpg" alt="Banner">
                                    </a>
                                    <div class="banner-content">
                                        <h4 class="banner-subtitle text-darkwhite"><a href="#">New in</a></h4>
                                        <h3 class="banner-title text-white"><a href="#">Best Lighting <br>Collection</a></h3>
                                        <a href="#" class="btn btn-outline-white banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @if(!empty($getPartner->count()))
                <div class="mb-6"></div>

                <div class="owl-carousel owl-simple" data-toggle="owl"
                    data-owl-options='{
                            "nav": false, 
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                    @foreach($getPartner as $partner)
                    @if(!empty($partner->getImage()))
                    <a href="{{ !empty($partner->button_link) ? $partner->button_link : '#' }}" class="brand">
                        <img src="{{ $partner->getImage() }}" style="height: 100px; width: 100px; border-radius: 20%;">
                    </a>
                    @endif
                    @endforeach

                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mb-6"></div><!-- End .mb-6 -->

    @if(!empty($getProductTrendy->count()))
    <div class="container-fluid">
        <div class="heading heading-center mb-3">
            <h2 class="title-lg" style="font-family: 'Trebuchet MS', sans-serif; font-size: 50px; font-weight: bold; color: #997d57; text-align: center; margin: 20px 0;">
                {{ !empty($getHomeSetting->trendy_product_title) ? $getHomeSetting->trendy_product_title : 'Trendy Products'}}
            </h2>



        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1200": {
                                            "items":4,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>
                    @foreach($getProductTrendy as $value)

                    @php
                    $getProductImage = $value->getImageSingle($value->id);
                    @endphp

                    <div class="product product-7 text-center" style="border: 1px solid #e1e1e1; border-radius: 8px; padding: 15px; transition: box-shadow 0.3s ease; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                        <figure class="product-media" style="position: relative; overflow: hidden; border-radius: 8px;">
                            <a href="{{ url($value->slug) }}">
                                @if(!empty($getProductImage) && !empty($getProductImage->get_image()))
                                <img style="height: 280px; width: 100%; object-fit:cover; transition: transform 0.3s ease;" src="{{ $getProductImage->get_image() }}" alt="{{ $value->title }}" class="product-image">
                                @endif
                            </a>

                            <div class="product-action-vertical" style="position: absolute; top: 10px; right: 10px;">
                                @if(!empty(Auth::check()))
                                <a href="javascript:;" class="add_to_wishlist add_to_wishlist{{ $value->id }} btn-product-icon btn-wishlist btn-expandable {{ !empty($value->checkWishList($value->id)) ? 'btn-wishlist-add' : ''}}" id="{{ $value->id }}" title="Wishlist" style="background-color: #ffffff; border-radius: 50%; padding: 10px; transition: background-color 0.3s ease;">
                                    <span style="font-size: 12px; color: #555;">&#9825; Add to Wishlist</span>
                                </a>
                                @else
                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist" style="background-color: #ffffff; border-radius: 50%; padding: 10px; transition: background-color 0.3s ease;">
                                    <span style="font-size: 12px; color: #555;">&#9825; Add to Wishlist</span>
                                </a>
                                @endif
                            </div><!-- End .product-action-vertical -->
                        </figure><!-- End .product-media -->

                        <div class="product-body" style="margin-top: 15px;">
                            <div class="product-cat" style="font-size: 14px; color: #888;">
                                <a href="{{ url($value->category_slug.'/'.$value->sub_category_slug) }}" style="color: #888; text-transform: uppercase;">{{ $value->sub_category_name }}</a>
                            </div><!-- End .product-cat -->

                            <h3 class="product-title" style="font-size: 18px; font-weight: 600; margin: 10px 0;">
                                <a href="{{ url($value->slug) }}" style="color: #333; text-decoration: none;">{{ $value->title }}</a>
                            </h3><!-- End .product-title -->

                            <div class="product-price" style="font-size: 20px; font-weight: bold; color: #FF5733;">
                                ${{ number_format($value->price, 2) }}
                            </div><!-- End .product-price -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: {{ $value->getReviewRating($value->id) }}%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( {{ $value->getTotalReview() }} Reviews )</span>
                            </div>
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->


                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->
    @endif

    @if(!empty($getCategory->count()))
    <div class="container-fluid categories pt-6">
        <h2 class="title-lg text-center mb-4">{{ !empty($getHomeSetting->shop_by_category_title) ? $getHomeSetting->shop_by_category_title : 'Shop by Categories'}}</h2><!-- End .title-lg text-center -->

        <div class="row">

            @foreach($getCategory as $category)
            @if(!empty($category->getImage()))
            <div class="col-sm-12 col-lg-4 banners-sm">
                <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                    <a href="{{ url($category->slug) }}">
                        <img src="{{ $category->getImage() }}" alt="{{ $category->name }}" style="height: 400px; object-fit: cover; width: 100%; border-radius: 15px;">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a href="{{ url($category->slug) }}">{{ $category->name }}</a></h3>
                        @if(!empty($category->button_name))
                        <a href="{{ url($category->slug) }}" class="btn btn-outline-white banner-link">{{ $category->button_name }}<i class="icon-long-arrow-right"></i></a>
                        @endif
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-sm-6 col-lg-3 -->
            @endif
            @endforeach
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- End .mb-6 -->

    @endif

    <div class="container-fluid">
        <div class="heading heading-center mb-6">
            <h2 class="title">{{ !empty($getHomeSetting->recent_arrival_title) ? $getHomeSetting->recent_arrival_title : 'Recent Arrivals'}}</h2><!-- End .title -->

            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                </li>
                @foreach($getCategory as $category)
                <li class="nav-item">
                    <a class="nav-link getCategoryProduct" data-val="{{ $category->id }}" id="top-{{ $category->slug }}-link" data-toggle="tab" href="#top-{{ $category->slug }}-tab" role="tab" aria-controls="top-{{ $category->slug }}-tab" aria-selected="false">{{ $category->name }}</a>
                </li>
                @endforeach

            </ul>
        </div><!-- End .heading -->

        <div class="tab-content">
            <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                <div class="products">
                    @php
                    $is_home = 1;
                    @endphp
                    @include('product._list')
                </div><!-- End .products -->

                <div class="more-container text-center">
                    <a href="{{ url('search') }}" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
                </div><!-- End .more-container -->

            </div><!-- .End .tab-pane -->

            @foreach($getCategory as $category)
            <div class="tab-pane p-0 fade getCategoryProduct{{ $category->id }}" id="top-{{ $category->slug }}-tab" role="tabpanel" aria-labelledby="top-{{ $category->slug }}-link">


            </div><!-- .End .tab-pane -->
            @endforeach
        </div><!-- End .tab-content -->

    </div><!-- End .container -->

    <div class="container-fluid">
        <hr>
        <div class="row justify-content-center">
            @if(!empty($getHomeSetting->payment_delivery_title))
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    @if(!empty($getHomeSetting->getPaymentImage()))
                    <span class="icon-box-icon">
                        <img src="{{ $getHomeSetting->getPaymentImage() }}" alt="" style="height: 150px; width: 150px; border-radius: 50%;">
                    </span>
                    @endif
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{ $getHomeSetting->payment_delivery_title }}</h3><!-- End .icon-box-title -->
                        <p>{{ $getHomeSetting->payment_delivery_description }}</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
            @endif

            @if(!empty($getHomeSetting->refund_title))
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    @if(!empty($getHomeSetting->getRefundImage()))
                    <span class="icon-box-icon">
                        <img src="{{ $getHomeSetting->getRefundImage() }}" alt="" style="height: 150px; width: 150px; border-radius: 50%;">
                    </span>
                    @endif
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{ $getHomeSetting->refund_title }}</h3><!-- End .icon-box-title -->
                        <p>{{ $getHomeSetting->refund_description }}</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
            @endif

            @if(!empty($getHomeSetting->support_title))
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    @if(!empty($getHomeSetting->getSupportImage()))
                    <span class="icon-box-icon">
                        <img src="{{ $getHomeSetting->getSupportImage() }}" alt="" style="height: 150px; width: 150px; border-radius: 50%;">
                    </span>
                    @endif
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">{{ $getHomeSetting->support_title }}</h3><!-- End .icon-box-title -->
                        <p>{{ $getHomeSetting->support_description }}</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
            @endif

        </div><!-- End .row -->

        <div class="mb-2"></div><!-- End .mb-2 -->
    </div><!-- End .container -->

    @if(!empty($getBlog->count()))
    <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
        <div class="container-fluid">
            <h2 class="title-lg text-center mb-3 mb-md-4">{{ !empty($getHomeSetting->blog_title) ? $getHomeSetting->blog_title : 'Our Blog'}}</h2><!-- End .title-lg text-center -->

            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                @foreach($getBlog as $blog)
                <article class="entry entry-display">
                    <figure class="entry-media" style="height: 400px; border-radius: 10%;">
                        <a href="{{ url('blog/'.$blog->slug) }}">
                            <img src="{{ $blog->getImage() }}" alt="{{ $blog->title }}" style="height: 400px; border-radius: 10%;">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body pb-4 text-center">
                        <div class="entry-meta">
                            <a href="#">{{ date('M d, Y', strtotime($blog->created_at))}}</a>, {{ $blog->getCommentCount() }} Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>{{ $blog->short_description }}</p>
                            <a href="{{ url('blog/'.$blog->slug) }}" class="read-more">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->
                @endforeach

            </div><!-- End .owl-carousel -->
        </div><!-- container -->

        <div class="more-container text-center mb-0 mt-3">
            <a href="{{ url('blog') }}" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
        </div><!-- End .more-container -->
    </div>
    @endif

    @if(!empty($getHomeSetting->signup_title))
    <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url('{{ $getHomeSetting->getSignupImage() }}');">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-8">
                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                        <div class="col">
                            <h3 class="cta-title text-white">{{ $getHomeSetting->signup_title }}</h3><!-- End .cta-title -->
                            <p class="cta-desc text-white">{{ $getHomeSetting->signup_description }}</p><!-- End .cta-desc -->
                        </div><!-- End .col -->

                        <div class="col-auto">
                            @if(empty(Auth::check()))
                            <a href="#signin-modal" data-toggle="modal" class="btn btn-outline-white"><span>SIGN UP</span><i class="icon-long-arrow-right"></i></a>
                            @endif
                        </div><!-- End .col-auto -->
                    </div><!-- End .row no-gutters -->
                </div><!-- End .col-md-10 col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->
    @endif
</main><!-- End .main -->

@endsection

@section('script')

<script type="text/javascript">
    $('body').delegate('.getCategoryProduct', 'click', function() {

        var category_id = $(this).attr('data-val');

        $.ajax({
            type: "POST",
            url: "{{ url('recent_arrival_category_product') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                category_id: category_id,
            },
            dataType: "json",
            success: function(response) {
                $('.getCategoryProduct' + category_id).html(response.success)
            },
        });
    });
</script>
@endsection