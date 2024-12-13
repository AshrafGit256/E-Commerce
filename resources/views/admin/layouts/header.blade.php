<style>
  .notification-dropdown {
    max-height: 300px;
    /* Limit the height of the dropdown */
    overflow-y: auto;
    /* Enable scrolling */
  }

  .notification-item {
    padding: 10px;
    /* Add padding for better spacing */
    display: flex;
    /* Flexbox layout */
    align-items: center;
    /* Vertically align content */
  }

  .unread {
    font-weight: bold;
    /* Highlight unread messages */
    background-color: #f8f9fa;
    /* Light background for unread notifications */
  }

  .notification-message {
    max-width: 220px;
    /* Limit message width */
    white-space: nowrap;
    /* Prevent wrapping */
    overflow: hidden;
    /* Hide overflow text */
    text-overflow: ellipsis;
    /* Show ellipsis if text overflows */
  }

  .notification-item:hover {
    background-color: #f1f1f1;
    /* Add a subtle hover effect */
  }

  .user-name {
    font-family: 'Lora', serif;
    font-size: 1.2em;
    /* Adjust size as needed */
    font-weight: bold;
    color: #333;
    /* Dark color for professional look */
    text-transform: capitalize;
    letter-spacing: 0.5px;
  }

  .sidebar {
    height: 100vh;
    /* Full viewport height */
    overflow-y: auto;
    /* Enables vertical scrolling */
    position: fixed;
    /* Ensures the sidebar stays fixed on the screen */
  }
</style>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Lora:wght@700&display=swap" rel="stylesheet">


@php
$getSettingHeader = App\Models\SystemSettingModel::getSingle();
@endphp

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    @php
    $getUnreadNotification = App\Models\NotificationModel::getUnreadNotification();
    @endphp

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if($getUnreadNotification->count() > 0)
        <span class="badge badge-warning navbar-badge" style="color: black; font-weight:bold;">{{ $getUnreadNotification->count() }}</span>
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">
          {{ $getUnreadNotification->count() > 0 ? $getUnreadNotification->count() . ' Notifications' : 'No new notifications' }}
        </span>

        <div class="notification-dropdown">
          @if($getUnreadNotification->isEmpty())
          <div class="dropdown-item text-center text-muted">
            No new notifications
          </div>
          @else
          @foreach($getUnreadNotification as $notify)
          <div class="dropdown-divider"></div>
          <a href="{{ $notify->url }} ? notify_id={{ $notify->id }}" class="dropdown-item d-flex align-items-start notification-item {{ $notify->is_read ? '' : 'unread' }}">
            <div class="fas fa-envelope mr-2"></div>
            <div class="notification-message">
              {{ $notify->message }}
              <div class="text-muted text-sm">
                {{ \Carbon\Carbon::parse($notify->created_at)->format('F j, Y h:i A') }}
              </div>
            </div>
          </a>
          @endforeach
          @endif
        </div>

        <div class="dropdown-divider"></div>
        <a href="{{ url('admin/notification') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>

    <!-- Fullscreen Button -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="display: flex; align-items: center; padding: 10px 20px; color: white;">
      <img src="{{ $getSettingHeader->getFavicon() }}" alt="AdminLTE Logo" class="brand-image img-square elevation-3" style="margin-right: 10px;">
      <span class="brand-text font-weight-light" style="font-size: 1.2rem; font-weight: 600;">{{ $getSettingHeader->website_name}}</span>
    </a>



    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(!empty(Auth::user()->getImage()))
        <img src="{{ Auth::user()->getImage() }}" class="img-circle elevation-2" alt="User Image" style="height: 60px; width: 60px; border-radius: 20%">
        @else
        <img src="{{ asset('upload/user/h2.jpg') }}" class="img-circle elevation-2" alt="Default User Image" style="height: 60px; width: 60px; border-radius: 20%">
        @endif
      </div>
      <div class="info">
        <a class="d-block user-name">{{ Auth::user()->name }}</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Admin
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/customer/list') }}" class="nav-link @if(Request::segment(2) == 'customer') active @endif">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Customers
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/order/list') }}" class="nav-link @if(Request::segment(2) == 'order') active @endif">
            <i class="fas fa-shopping-bag" style="margin-right: 10px;"></i>
            <p>
              Orders
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/category/list') }}" class="nav-link @if(Request::segment(2) == 'category') active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              Category
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/sub_category/list') }}" class="nav-link @if(Request::segment(2) == 'sub_category') active @endif">
            <i class="nav-icon fas fa-th-list"></i>

            <p>
              Sub-Category
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/brand/list') }}" class="nav-link @if(Request::segment(2) == 'brand') active @endif">
            <i class="nav-icon fas fa-tag"></i>
            <p>
              Brand
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/color/list') }}" class="nav-link @if(Request::segment(2) == 'color') active @endif">
            <i class="nav-icon fas fa-fill-drip"></i>
            <p>
              Color
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/product/list') }}" class="nav-link @if(Request::segment(2) == 'product') active @endif">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Product
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/timeline') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Timeline</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/discount_code/list') }}" class="nav-link @if(Request::segment(2) == 'discount_code') active @endif">
            <i class="nav-icon fas fa-percent"></i>
            <p>
              Discount Code
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/shipping_charge/list') }}" class="nav-link @if(Request::segment(2) == 'shipping_charge') active @endif">
            <i class="nav-icon fas fa-truck"></i>
            <p>
              Shipping Cost
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Home Sliders
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">3</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/slider/list') }}" class="nav-link @if(Request::segment(2) == 'slider') active @endif">
                <i class="nav-icon fas fa-images"></i>
                <p>Left Slider</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/top_slider/list') }}" class="nav-link @if(Request::segment(2) == 'top_slider') active @endif">
                <i class="nav-icon fas fa-images"></i>
                <p>Top Slider</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/bottom_slider/list') }}" class="nav-link @if(Request::segment(2) == 'bottom_slider') active @endif">
                <i class="nav-icon fas fa-images"></i>
                <p>Bottom Slider</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/partner/list') }}" class="nav-link @if(Request::segment(2) == 'partner') active @endif">
            <i class="nav-icon fas fa-handshake"></i>
            <p>
              Partner Logo
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/contactUs') }}" class="nav-link @if(Request::segment(2) == 'contactUs') active @endif">
            <i class="nav-icon fas fa-phone"></i>
            <p>
              Contact Us
            </p>
          </a>
        </li>



        <li class="nav-item">
          <a href="{{ url('admin/page/list') }}" class="nav-link @if(Request::segment(2) == 'page') active @endif">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Pages
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/blog_category/list') }}" class="nav-link @if(Request::segment(2) == 'blog_category') active @endif">
            <i class="nav-icon fas fa-tags"></i> <!-- Changed icon to fa-tags -->
            <p>
              Blog Category
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/blog/list') }}" class="nav-link @if(Request::segment(2) == 'blog') active @endif">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Blog
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/system-setting') }}" class="nav-link @if(Request::segment(2) == 'system-setting') active @endif">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              System Setting
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/home-setting') }}" class="nav-link @if(Request::segment(2) == 'home-setting') active @endif">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home Setting
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/smtp-setting') }}" class="nav-link @if(Request::segment(2) == 'smtp-setting') active @endif">
            <i class="nav-icon fas fa-server"></i>
            <p>
              SMTP Setting
            </p>
          </a>
        </li>

        <!-- Logout section -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>

        <li class="nav-item">
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
            <i class="nav-icon fas fa-arrow-left"></i>
            <p>Logout</p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>