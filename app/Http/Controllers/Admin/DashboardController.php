<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Set the header title
        $data['header_title'] = "Dashboard 1";
        
        // Pass the data to the view
        return view('admin.dashboard', $data);
    }
}
