<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // Set the header title
        $data['TotalOrder'] = OrderModel::getTotalOrder();
        $data['TotalTodayOrder'] = OrderModel::getTotalTodayOrder();
        $data['TotalAmount'] = OrderModel::getTotalAmount();
        $data['TotalTodayAmount'] = OrderModel::getTotalTodayAmount();
        $data['TotalCustomer'] = User::getTotalCustomer();
        $data['TotalTodayCustomer'] = User::getTotalTodayCustomer();

        $data['getLatestOrders'] = OrderModel::getLatestOrders();

        if(!empty($request->year))
        {
            $year = $request->year;
        }
        else
        {
            $year = date('Y');
        }

        $getTotalCustomerMonth = '';
        $getTotalOrderMonth = '';
        $getTotalOrderAmountMonth = '';

        $totalAmount = 0;

        for($month = 1; $month <= 12; $month++)
        {
            $startDate = new \DateTime("$year-$month-01");
            $endDate = new \DateTime("$year-$month-01");
            $endDate->modify('last day of this month');

            $start_date = $startDate->format('Y-m-d');
            $end_date = $endDate->format('Y-m-d');

            // Fetch the total customer count for the given month
            $customer = User::getTotalCustomerMonth($start_date, $end_date);
            $getTotalCustomerMonth .= $customer . ',';

            $order = OrderModel::getTotalOrderMonth($start_date, $end_date);
            $getTotalOrderMonth .= $order . ',';

            $order_payment = OrderModel::getTotalOrderAmountMonth($start_date, $end_date);
            $getTotalOrderAmountMonth .= $order_payment . ',';

            $totalAmount = $totalAmount + $order_payment;
        }

        $data['getTotalCustomerMonth'] = rtrim($getTotalCustomerMonth, ",");
        $data['getTotalOrderMonth'] = rtrim($getTotalOrderMonth, ",");
        $data['getTotalOrderAmountMonth'] = rtrim($getTotalOrderAmountMonth, ",");

        $data['totalAmount'] = $totalAmount;
        $data['year'] = $year;


        $data['header_title'] = "Dashboard";
        
        // Pass the data to the view
        return view('admin.dashboard', $data);
    }
}
