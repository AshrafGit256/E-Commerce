<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorModel;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ColorModel::getRecord();
        $data['header_title'] = 'Color';
        return view('admin.color.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New color';
        return view('admin.color.add', $data);
    }

    public function insert(Request $request)
    {
        $color = new ColorModel;
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $color->created_by = Auth::user()->id;
        $color->save();

        return redirect('admin/color/list')->with('Success', "Color  Successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = ColorModel::getSingle($id);
        $data['header_title'] = 'Edit color';
        return view('admin.color.edit', $data);
    }

    public function update($id, Request $request)
    {
        $color = ColorModel::getSingle($id); // Ensure getSingle method exists in your model
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $color->save();

        return redirect('admin/color/list')->with('Success', "Color Successfully Updated"); 
    }

    public function delete($id)
    {
        $color = ColorModel::getSingle($id);
        $color->is_delete =1;
        $color->save();

        return redirect()->back()->with('Success', "Color Successfully Deleted"); 
    }
}
