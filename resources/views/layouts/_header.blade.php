<header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <div class="header-dropdown">
                            <a href="#">Usd</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">Usd</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="header-dropdown">
                            <a href="#">Eng</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                                    <li><a href="{{ url('wishlist') }}"><i class="icon-heart-o"></i>My Wishlist <span>(3)</span></a></li>
                                    <li><a href="{{ url('about') }}">About Us</a></li>
                                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                                    <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{ url('') }}" class="logo">
                            <img src="{{ url('assets/images/logo.png') }}" alt="E-Commerce" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="active">
                                    <a href="{{ url('') }}">Home</a>

                                    
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Shop</a>

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
                                                    <a href="product.html" class="product-image">
                                                        <img src="{{ $getProductImage->get_image() }}" alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
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