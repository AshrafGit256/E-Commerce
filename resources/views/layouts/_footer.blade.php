<style>
    .footer {
        background-color: #333;
        /* Dark gray background */
        color: #f8f9fa;
        /* Light gray text color for contrast */
        padding: 40px 0;
        /* Padding for spaciousness */
    }

    .footer-link {
        color: #f8f9fa;
        /* Light gray link color */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-link:hover {
        color: #ddd;
        /* Slightly darker gray on hover */
        text-decoration: underline;
    }

    .footer-logo {
        width: 120px;
        height: auto;
        margin-bottom: 15px;
    }

    .footer-title {
        color: #f8f9fa;
        /* Light gray for titles */
        margin-bottom: 15px;
        font-size: 18px;
        /* Larger font size for visibility */
    }

    .social-icon {
        margin-right: 10px;
        color: #f8f9fa;
        /* Light gray for icons */
        transition: color 0.3s ease;
    }

    .social-icon:hover {
        color: #ddd;
        /* Slightly darker gray on hover */
    }

    .footer-bottom {
        background-color: #444;
        /* Slightly lighter gray for bottom */
        padding: 20px 0;
        /* Padding for bottom section */
        text-align: center;
        /* Centered text */
    }

    .footer-bottom p {
        margin: 0;
        color: #bbb;
        /* Medium gray for copyright */
    }

    .footer-payments img {
        width: 100px;
        height: auto;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .footer-link {
            font-size: 14px;
            /* Smaller font for mobile */
        }

        .footer-title {
            font-size: 16px;
            /* Smaller title font on mobile */
        }
    }
</style>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <!-- About Section -->
            <div class="col-sm-6 col-lg-3">
                <div class="widget">
                    

                    <!-- Site Logo -->
                    <div id="logoModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); justify-content: center; align-items: center;">
                        <span class="close" onclick="closeModal()" style="position: absolute; top: 20px; right: 30px; color: white; font-size: 30px; cursor: pointer;">&times;</span>
                        <img id="modalImage" style="max-width: 90%; max-height: 90%; border-radius: 8px;">
                    </div>


                    <a href="javascript:void(0);" class="logo" onclick="openModal('{{ $getSystemSettingApp->getLogo() }}')">
                        <img src="{{ $getSystemSettingApp->getLogo() }}" alt="E-Commerce" width="140" height="140" style="border-radius: 20%;">
                    </a>
                    

                    <p style="font-size: 14px; line-height: 1.6;">{{ $getSystemSettingApp->footer_description }}</p>

                    <div class="social-icons" style="margin-top: 15px;">
                        @if(!empty($getSystemSettingApp->facebook_link))
                        <a href="{{ $getSystemSettingApp->facebook_link }}" class="social-icon" title="Facebook" target="_blank">
                            <i class="icon-facebook-f" style="font-size: 20px;"></i>
                        </a>
                        @endif
                        @if(!empty($getSystemSettingApp->twitter_link))
                        <a href="{{ $getSystemSettingApp->twitter_link }}" class="social-icon" title="Twitter" target="_blank">
                            <i class="icon-twitter" style="font-size: 20px;"></i>
                        </a>
                        @endif
                        @if(!empty($getSystemSettingApp->instagram_link))
                        <a href="{{ $getSystemSettingApp->instagram_link }}" class="social-icon" title="Instagram" target="_blank">
                            <i class="icon-instagram" style="font-size: 20px;"></i>
                        </a>
                        @endif
                        @if(!empty($getSystemSettingApp->youtube_link))
                        <a href="{{ $getSystemSettingApp->youtube_link }}" class="social-icon" title="Youtube" target="_blank">
                            <i class="icon-youtube" style="font-size: 20px;"></i>
                        </a>
                        @endif
                        @if(!empty($getSystemSettingApp->pinterest_link))
                        <a href="{{ $getSystemSettingApp->pinterest_link }}" class="social-icon" title="Pinterest" target="_blank">
                            <i class="icon-pinterest" style="font-size: 20px;"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Useful Links -->
            <div class="col-sm-6 col-lg-3">
                <div class="widget">
                    <h4 class="footer-title">Useful Links</h4>
                    <ul class="widget-list" style="padding-left: 0; list-style: none;">
                        <li><a href="{{ url('') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ url('about') }}" class="footer-link">About Us</a></li>
                        <li><a href="{{ url('faq') }}" class="footer-link">FAQ</a></li>
                        <li><a href="{{ url('contact') }}" class="footer-link">Contact us</a></li>
                        <li><a href="{{ url('blog') }}" class="footer-link">Blog</a></li>
                        <li><a href="#signin-modal" data-toggle="modal" class="footer-link">Log in</a></li>
                    </ul>
                </div>
            </div>

            <!-- Customer Service -->
            <div class="col-sm-6 col-lg-3">
                <div class="widget">
                    <h4 class="footer-title">Customer Service</h4>
                    <ul class="widget-list" style="padding-left: 0; list-style: none;">
                        <li><a href="{{ url('payment-methods') }}" class="footer-link">Payment Methods</a></li>
                        <li><a href="{{ url('money-back-guarantee') }}" class="footer-link">Money-back guarantee!</a></li>
                        <li><a href="{{ url('return') }}" class="footer-link">Returns</a></li>
                        <li><a href="{{ url('shipping') }}" class="footer-link">Shipping</a></li>
                        <li><a href="{{ url('terms-condition') }}" class="footer-link">Terms and conditions</a></li>
                        <li><a href="{{ url('privacy-policy') }}" class="footer-link">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>

            <!-- My Account -->
            <div class="col-sm-6 col-lg-3">
                <div class="widget">
                    <h4 class="footer-title">My Account</h4>
                    <ul class="widget-list" style="padding-left: 0; list-style: none;">
                        <li><a href="{{ url('cart') }}" class="footer-link">View Cart</a></li>
                        <li><a href="{{ url('checkout') }}" class="footer-link">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="footer-bottom">
        <div class="container-fluid">
            <p class="footer-copyright">Copyright © {{ date('Y') }} {{ $getSystemSettingApp->website_name }}. All Rights Reserved.</p>
            <figure class="footer-payments">
                <img src="{{ $getSystemSettingApp->getFooterPaymentIcon() }}" alt="Payment methods">
            </figure>
        </div>
    </div><!-- End .footer-bottom -->
</footer>