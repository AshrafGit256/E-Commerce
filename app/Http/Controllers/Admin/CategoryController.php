<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = CategoryModel::getRecord();
        $data['header_title'] = 'Category';
        return view('admin.category.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Category';
        return view('admin.category.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:category',
            
        ]);

        $Category = new CategoryModel;
        $Category->name = trim($request->name);
        $Category->slug = trim($request->slug);
        $Category->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $Category->meta_title = trim($request->meta_title);
        $Category->meta_description = trim($request->meta_description);
        $Category->meta_keywords = trim($request->meta_keywords);
        $Category->created_by = Auth::user()->id;

        $Category->button_name = trim($request->button_name);
        $Category->is_home = !empty($request->is_home) ? 1 : 0;
        $Category->is_menu = !empty($request->is_menu) ? 1 : 0;

        if(!empty($request->file('image_name')))
        {
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/category/'), $filename);
            $Category->image_name = trim($filename);
        }

        $Category->save();

        return redirect('admin/category/list')->with('Success', "Category Successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = CategoryModel::getSingle($id);
        $data['header_title'] = 'Edit Category';
        return view('admin.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'slug'=>'required|unique:category,slug,' .$id,
        ]);


        $category = CategoryModel::getSingle($id); // Ensure getSingle method exists in your model
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);

        $category->button_name = trim($request->button_name);
        $category->is_home = !empty($request->is_home) ? 1 : 0;
        $category->is_menu = !empty($request->is_menu) ? 1 : 0;

        if(!empty($request->file('image_name')))
        {
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/category/'), $filename);
            $category->image_name = trim($filename);
        }

        $category->save();

        return redirect('admin/category/list')->with('Success', "Category Successfully Updated"); 
    }

    public function delete($id)
    {
        $category = CategoryModel::getSingle($id);
        $category->is_delete =1;
        $category->save();

        return redirect()->back()->with('Success', "Category Successfully Deleted"); 
    }

}
