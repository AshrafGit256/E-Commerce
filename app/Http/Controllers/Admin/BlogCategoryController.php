<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategoryModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = BlogCategoryModel::getRecord();
        $data['header_title'] = 'Blog Category';
        return view('admin.blog_category.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Blog Category';
        return view('admin.blog_category.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:blog_category',
            
        ]);

        $blog_category = new BlogCategoryModel;
        $blog_category->name = trim($request->name);
        $blog_category->slug = trim($request->slug);
        $blog_category->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $blog_category->meta_title = trim($request->meta_title);
        $blog_category->meta_description = trim($request->meta_description);
        $blog_category->meta_keywords = trim($request->meta_keywords);

        $blog_category->save();

        return redirect('admin/blog_category/list')->with('success', "Blog Category successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = BlogCategoryModel::getSingle($id);
        $data['header_title'] = 'Edit Blog Category';
        return view('admin.blog_category.edit', $data);
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'slug'=>'required|unique:blog_category,slug,' .$id,
        ]);


        $blog_category = BlogCategoryModel::getSingle($id); // Ensure getSingle method exists in your model
        $blog_category->name = trim($request->name);
        $blog_category->slug = trim($request->slug);
        $blog_category->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $blog_category->meta_title = trim($request->meta_title);
        $blog_category->meta_description = trim($request->meta_description);
        $blog_category->meta_keywords = trim($request->meta_keywords);

        $blog_category->save();

        return redirect('admin/blog_category/list')->with('success', "Blog Category successfully Updated"); 
    }

    public function delete($id)
    {
        $blog_category = BlogCategoryModel::getSingle($id);
        $blog_category->is_delete =1;
        $blog_category->save();

        return redirect()->back()->with('success', "Blog Category successfully Deleted"); 
    }

}
