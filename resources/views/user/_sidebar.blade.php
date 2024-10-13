<aside class="col-md-4 col-lg-3">
    <div class="sidebar-header">
        <h4>User Menu</h4>
    </div>
    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
        <li class="nav-item">
            <a href="{{ url('user/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="fa fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="separator"></li> <!-- Separator -->
        <li class="nav-item">
            <a href="{{ url('user/orders') }}" class="nav-link @if(Request::segment(2) == 'orders') active @endif">
                <i class="fa fa-shopping-cart"></i> Orders
            </a>
        </li>
        <li class="separator"></li> <!-- Separator -->
        <li class="nav-item">
            <a href="{{ url('user/edit-profile') }}" class="nav-link @if(Request::segment(2) == 'edit-profile') active @endif">
                <i class="fa fa-user-edit"></i> Edit Profile
            </a>
        </li>
        <li class="separator"></li> <!-- Separator -->
        <li class="nav-item">
            <a href="{{ url('user/change-password') }}" class="nav-link @if(Request::segment(2) == 'change-password') active @endif">
                <i class="fa fa-key"></i> Change Password
            </a>
        </li>
        <li class="separator"></li> <!-- Separator -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">
                <i class="fa fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</aside><!-- End .col-lg-3 -->

<!-- Optional CSS Styles -->
<style>
    /* Sidebar Overall */
    aside {
        background-color: white; /* Sidebar background color */
        border-radius: 5px; /* Rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        padding: 10px; /* Reduced padding around the sidebar */
        max-width: 300px; /* Set a maximum width for the sidebar */
        margin: auto; /* Center the sidebar */
    }

    /* Sidebar Header */
    .sidebar-header {
        text-align: center;
        padding: 10px; /* Reduced padding */
        background-color: #343a40; /* Header background color */
        color: white;
        border-radius: 5px;
        margin-bottom: 15px; /* Reduced margin */
    }

    .sidebar-header h4 {
        font-size: 18px; /* Reduced font size for better visibility */
        margin: 0; /* Remove default margin */
        color: white;
    }

    /* Navigation Items */
    .nav-link {
        padding: 10px 12px; /* Reduced padding for links */
        color: #333;
        border-radius: 4px; /* Slightly reduced border radius */
        transition: background-color 0.3s ease, color 0.3s ease;
        position: relative;
        display: flex; /* To align icons with text */
        align-items: center; /* Center align icon and text */
        border: 1px solid transparent; /* Default border */
    }

    /* Hover and Active States */
    .nav-link:hover {
        background-color: #f0f0f0; /* Light gray on hover */
        color: #007bff; /* Change text color on hover */
    }

    .nav-link.active {
        background-color: #343a40; /* Active link background */
        color: white; /* Active link text color */
    }

    /* Icon spacing */
    .nav-link i {
        margin-right: 8px; /* Space between icon and text */
    }

    /* Separators */
    .separator {
        height: 1px;
        background-color: #ddd; /* Change to your preferred color */
        margin: 5px 0; /* Space above and below the separator */
    }

    /* Margin for nav items */
    .nav-item {
        margin-bottom: 0; /* No bottom margin for items */
    }
</style>
