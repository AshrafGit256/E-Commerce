<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list()
    {
        $data['getRecord'] = BrandModel::getRecord();
        $data['header_title'] = 'brand';
        return view('admin.brand.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Brand';
        return view('admin.brand.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:brand',
            
        ]);

        $brand = new BrandModel;
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
        $brand->created_by = Auth::user()->id;
        $brand->save();

        return redirect('admin/brand/list')->with('Success', "Brand  Successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = BrandModel::getSingle($id);
        $data['header_title'] = 'Edit brand';
        return view('admin.brand.edit', $data);
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'slug'=>'required|unique:brand,slug,' .$id,
        ]);


        $brand = BrandModel::getSingle($id); // Ensure getSingle method exists in your model
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
        $brand->save();

        return redirect('admin/brand/list')->with('Success', "Brand Successfully Updated"); 
    }

    public function delete($id)
    {
        $brand = BrandModel::getSingle($id);
        $brand->is_delete =1;
        $brand->save();

        return redirect()->back()->with('Success', "Brand Successfully Deleted"); 
    }
}
