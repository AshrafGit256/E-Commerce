<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<header class="header">
    <div class="header-top">
        <div class="container-fluid">
            <div class="header-left">

                <div class="header-dropdown">
                <a href="#"><i class="fas fa-language" style="font-size: 30px;"></i></a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="?lang=en">English</a></li>
                            <li><a href="?lang=ar">Arabic</a></li>
                            <li><a href="?lang=zh">Chinese</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-dropdown">
                <a href="#"><i class="fas fa-yen-sign" style="font-size: 20px;"></i></a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Usd</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="http://127.0.0.1:8000/"><i class="fas fa-bell"></i>Molla WeChat</a></li>

                            <li><a href="tel:{{ $getSystemSettingApp->phone}}"><i class="fas fa-phone-alt"></i>Call: {{ $getSystemSettingApp->phone}}</a></li>

                            @if(!empty(Auth::check()))
                            <li><a href="{{ url('my-wishlist') }}"><i class="fas fa-heart"></i>My Wishlist </a></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal"><i class="fas fa-heart"></i>My Wishlist</a></li>
                            @endif

                            <li><a href="{{ url('about') }}"><i class="fas fa-info-circle"></i>About Us</a></li>

                            <li><a href="{{ url('contact') }}"><i class="fas fa-envelope"></i></i>Contact Us</a></li>

                            @if(!empty(Auth::check()))
                            <li><a href="{{ url('/dashboard') }}"><i class="fas fa-user"></i>{{ Auth::user()->name }}</a></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal"><i class="fas fa-user"></i>Login</a></li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>





                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="{{ (Request::segment(1) == '') ? 'active' : '' }}">
                            <a href="{{ url('') }}">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>

                        <li>
                            <a href="#" class="sf-with-ul">
                                <i class="fas fa-box-open"></i> Shop
                            </a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">

                                                @php
                                                $getCategoryHeader = App\Models\CategoryModel::getRecordMenu();
                                                @endphp

                                                @foreach($getCategoryHeader as $value_h_c)
                                                @if(!empty($value_h_c->getSubCategory->count()))
                                                <div class="col-md-4" style="margin-bottom: 20px;">
                                                    <a href="{{ $value_h_c->slug }}" class="menu-title">{{ $value_h_c->name }}</a>

                                                    <ul>

                                                        @foreach($value_h_c->getSubCategory as $value_h_sub)

                                                        <li><a href="{{ url($value_h_c->slug.'/'.$value_h_sub->slug) }}">{{ $value_h_sub->name }}</a></li>

                                                        @endforeach

                                                    </ul>


                                                </div><!-- End .col-md-6 -->
                                                @endif
                                                @endforeach

                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-8 -->

                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>

                        @php
                        $getCategoryHeaderMenu = App\Models\CategoryModel::getRecordMenuHeader();
                        @endphp

                        @foreach($getCategoryHeaderMenu as $menu)
                        <li class="{{ (Request::segment(1) == $menu->slug) ? 'active' : '' }}">
                            <a href="{{ $menu->slug }}">
                                <i class="fas fa-shopping-bag"></i> {{ $menu->name }}
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </nav>
            </div>


            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="{{ url('search') }}" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." value="{{ !empty(Request::get('q')) ? Request::get('q') : '' }}" required>
                        </div>
                    </form>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">{{ Cart::getContent()->count() }}</span>
                    </a>

                    @if(!empty(Cart::getContent()->count()))
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            @foreach(Cart::getContent() as $header_cart)
                            @php
                            $getCartProduct = App\Models\ProductModel::getSingle($header_cart->id);
                            @endphp

                            @if(!empty($getCartProduct))
                            @php
                            $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id);
                            @endphp
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="{{ url($getCartProduct->slug) }}">
                                        <a href="{{ url($getCartProduct->slug) }}">{{ $getCartProduct->title }}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">{{ $header_cart->quantity }}</span>
                                        x {{ number_format($header_cart->price), 2 }}
                                    </span>
                                </div>

                                <figure class="product-image-container">
                                    <a href="{{ url($getCartProduct->slug) }}" class="product-image">
                                        <img src="{{ $getProductImage->get_image() }}" alt="product">
                                    </a>
                                </figure>
                                <a href="{{ url('header_cart/delete/'.$header_cart->id) }}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div>
                            @endif
                            @endforeach
                        </div>

                        <div class="dropdown-cart-total">
                            <span>Total</span>

                            <span class="cart-total-price">${{ number_format(Cart::getSubTotal(), 2) }}</span>
                        </div>

                        <div class="dropdown-cart-action">
                            <a href="{{ url('cart') }}" class="btn btn-primary">View Cart</a>
                            <a href="{{ url('checkout') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function openModal(imageUrl) {
        document.getElementById("modalImage").src = imageUrl;
        document.getElementById("logoModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("logoModal").style.display = "none";
    }
</script>