<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubCategoryModel::getRecord();
        $data['header_title'] = 'Sub Category';
        return view('admin.sub_category.list', $data);
    }

    public function add()
    {
        $data['getCategory'] = CategoryModel::getRecord();
        $data['header_title'] = 'Add New Sub-Category';
        return view('admin.sub_category.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'slug' => 'required|unique:sub_category',
            
        ]);

        $subcategory = new SubCategoryModel;
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->created_by = Auth::user()->id;
        $subcategory->save();

        return redirect('admin/sub_category/list')->with('success', "Sub-Category successfully created");
    }

    public function edit($id)
    {
        $data['getCategory'] = CategoryModel::getRecord();
        $data['getRecord'] = SubCategoryModel::getSingle($id);
        $data['header_title'] = 'Edit SubCategory';
        return view('admin.sub_category.edit', $data);
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'slug'=>'required|unique:sub_category,slug,' .$id,
        ]);

        $subcategory = SubCategoryModel::getSingle($id);
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->save();

        return redirect('admin/sub_category/list')->with('success', "Sub-Category successfully updated"); 
    }

    public function delete($id)
    {
        $category = SubCategoryModel::getSingle($id);
        $category->is_delete =1;
        $category->save();

        return redirect()->back()->with('success', "Sub-Category successfully Deleted"); 
    }

    public function get_sub_category(Request $request)
    {
        $category_id = $request->id;
        $get_sub_category = SubCategoryModel::getRecordSubCategory($category_id);
        $html = '';
        $html .= '<option value="">Select</option>';

        foreach($get_sub_category  as $value)
        {
            $html .= '<option value=" '.$value->id.' ">'.$value->name.'</option>';
        }

        $json['html'] = $html;
        echo json_encode($json);
    }
}
