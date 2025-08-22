<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategoryModel;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function list()
    {
        $data['getRecord'] = BlogModel::getRecord();
        $data['header_title'] = 'Blog ';
        return view('admin.blog.list', $data);
    }

    public function add()
    {
        $data['getCategory'] = BlogCategoryModel::getRecordActive();
        $data['header_title'] = 'Add New Blog ';
        return view('admin.blog.add', $data);
    }

    public function insert(Request $request)
    {
        $blog = new BlogModel;
        $blog->title = trim($request->title);
        $blog->blog_category_id = trim($request->blog_category_id);
        $blog->short_description = trim($request->short_description);
        $blog->description = trim($request->description);
        $blog->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $blog->meta_title = trim($request->meta_title);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);

        $blog->save();

        if(!empty($request->file('image_name')))
        {
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/blog/'), $filename);
            $blog->image_name = trim($filename);
        }

        $slug = Str::slug($request->title);
        $count = BlogModel::where('slug', '=', $slug)->count();
        if(!empty($count))
        {
            $blog->slug = $slug.'-'.$blog->id;
        }
        else
        {
            $blog->slug = trim($slug);
        }

        $blog->save();

        return redirect('admin/blog/list')->with('success', "Blog  successfully created");
    }

    public function edit($id)
    {
        $data['getCategory'] = BlogCategoryModel::getRecordActive();
        $data['getRecord'] = BlogModel::getSingle($id);
        $data['header_title'] = 'Edit Blog ';
        return view('admin.blog.edit', $data);
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'slug'=>'required|unique:blog_category,slug,' .$id,
        ]);

        $blog = BlogModel::getSingle($id); // Ensure getSingle method exists in your model
        $blog->title = trim($request->title);
        $blog->slug = trim($request->slug);
        $blog->blog_category_id = trim($request->blog_category_id);
        $blog->short_description = trim($request->short_description);
        $blog->description = trim($request->description);
        $blog->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $blog->meta_title = trim($request->meta_title);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);

        $blog->save();

        if(!empty($request->file('image_name')))
        {
            if(!empty($blog->getImage()))
            {
                unlink('upload/blog/' .$blog->image_name);
            }
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/blog/'), $filename);
            $blog->image_name = trim($filename);
            $blog->save();
        }

        return redirect('admin/blog/list')->with('success', "Blog  successfully Updated"); 
    }

    public function delete($id)
    {
        $blog = BlogModel::getSingle($id);
        $blog->is_delete =1;
        $blog->save();

        return redirect()->back()->with('success', "Blog  successfully Deleted"); 
    }

}
