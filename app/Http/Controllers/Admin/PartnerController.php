<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartnerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function list()
    {
        $data['getRecord'] = PartnerModel::getRecord();
        $data['header_title'] = 'Partner';
        return view('admin.partner.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Partner';
        return view('admin.partner.add', $data);
    }

    public function insert(Request $request)
    {
        $partner = new PartnerModel;
        $partner->button_link = trim($request->button_link);

        $file = $request->file('image_name');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move(public_path('upload/partner/'), $filename);

        $partner->image_name = trim($filename);
        $partner->status = trim($request->status ?? 0); // Set a default value (e.g., 0) if status is empty
        $partner->save();

        return redirect('admin/partner/list')->with('Success', "partner  Successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = PartnerModel::getSingle($id);
        $data['header_title'] = 'Edit Partner';
        return view('admin.partner.edit', $data);
    }

    public function update($id, Request $request)
    {
        $partner = PartnerModel::getSingle($id); // Ensure getSingle method exists in your model
        $partner->button_link = trim($request->button_link);

        if(!empty($request->file('image_name')))
        {
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/partner/'), $filename);
            $partner->image_name = trim($filename);
        }
       
        $partner->status = trim($request->status ?? 0); // Set a default value (e.g., 0) if status is empty
        $partner->save();

        return redirect('admin/partner/list')->with('Success', "Partner Successfully Updated"); 
    }

    public function delete($id)
    {
        $partner = PartnerModel::getSingle($id);
        $partner->is_delete =1;
        $partner->save();

        return redirect()->back()->with('Success', "Partner Successfully Deleted"); 
    }
}
