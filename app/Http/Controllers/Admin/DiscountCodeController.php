<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountCodeModel;
use Illuminate\Support\Facades\Auth;

class DiscountCodeController extends Controller
{
    public function list()
    {
        $data['getRecord'] = DiscountCodeModel::getRecord();
        $data['header_title'] = 'Discount Code';
        return view('admin.discount_code.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Discount Code';
        return view('admin.discount_code.add', $data);
    }

    public function insert(Request $request)
    {
        $DiscountCode = new DiscountCodeModel;
        $DiscountCode->name = trim($request->name);
        $DiscountCode->type = trim($request->type);
        $DiscountCode->percent_amount = trim($request->percent_amount);
        $DiscountCode->expire_date = trim($request->expire_date);
        $DiscountCode->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $DiscountCode->save();

        return redirect('admin/discount_code/list')->with('Success', "Discount Code  Successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = DiscountCodeModel::getSingle($id);
        $data['header_title'] = 'Edit Discount Code';
        return view('admin.discount_code.edit', $data);
    }

    public function update($id, Request $request)
    {
        $DiscountCode = DiscountCodeModel::getSingle($id); // Ensure getSingle method exists in your model
        $DiscountCode->name = trim($request->name);
        $DiscountCode->type = trim($request->type);
        $DiscountCode->percent_amount = trim($request->percent_amount);
        $DiscountCode->expire_date = trim($request->expire_date);
        $DiscountCode->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $DiscountCode->save();

        return redirect('admin/discount_code/list')->with('Success', "Discount Code Successfully Updated"); 
    }

    public function delete($id)
    {
        $DiscountCode = DiscountCodeModel::getSingle($id);
        $DiscountCode->is_delete =1;
        $DiscountCode->save();

        return redirect()->back()->with('Success', "Discount Code Successfully Deleted"); 
    }
}
