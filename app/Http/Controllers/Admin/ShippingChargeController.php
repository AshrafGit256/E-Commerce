<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingChargeModel;
use Illuminate\Support\Facades\Auth;

class ShippingChargeController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ShippingChargeModel::getRecord();
        $data['header_title'] = 'Shipping Charge';
        return view('admin.shipping_charge.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Shipping Charge';
        return view('admin.shipping_charge.add', $data);
    }

    public function insert(Request $request)
    {
        $DiscountCode = new ShippingChargeModel;
        $DiscountCode->name = trim($request->name);
        $DiscountCode->price = trim($request->price);
        $DiscountCode->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $DiscountCode->save();

        return redirect('admin/shipping_charge/list')->with('success', "Shipping Charge  successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = ShippingChargeModel::getSingle($id);
        $data['header_title'] = 'Edit Shipping Charge';
        return view('admin.shipping_charge.edit', $data);
    }

    public function update($id, Request $request)
    {
        $DiscountCode = ShippingChargeModel::getSingle($id); // Ensure getSingle method exists in your model
        $DiscountCode->name = trim($request->name);
        $DiscountCode->price = trim($request->price);
        $DiscountCode->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $DiscountCode->save();

        return redirect('admin/shipping_charge/list')->with('success', "Shipping Charge successfully Updated"); 
    }

    public function delete($id)
    {
        $DiscountCode = ShippingChargeModel::getSingle($id);
        $DiscountCode->is_delete =1;
        $DiscountCode->save();

        return redirect()->back()->with('success', "Shipping Charge successfully Deleted"); 
    }
}
