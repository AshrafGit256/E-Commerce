<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BottomSliderModel;
use Illuminate\Support\Facades\Auth;

class BottomSliderController extends Controller
{
    public function list()
    {
        $data['getRecord'] = BottomSliderModel::getRecord();
        $data['header_title'] = 'Bottom Slider';
        return view('admin.bottom_slider.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Bottom Slider';
        return view('admin.bottom_slider.add', $data);
    }

    public function insert(Request $request)
    {
        $bottom_slider = new BottomSliderModel;
        $bottom_slider->sub_title = trim($request->sub_title);
        $bottom_slider->title = trim($request->title);
        $bottom_slider->button_name = trim($request->button_name);
        $bottom_slider->button_link = trim($request->button_link);

        $file = $request->file('image_name');

        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move(public_path('upload/bottom_slider/'), $filename);

        $bottom_slider->image_name = trim($filename);
        $bottom_slider->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $bottom_slider->save();

        return redirect('admin/bottom_slider/list')->with('Success', "Bottom Slider  Successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = BottomSliderModel::getSingle($id);
        $data['header_title'] = 'Edit Bottom Slider';
        return view('admin.bottom_slider.edit', $data);
    }

    public function update($id, Request $request)
    {
        $bottom_slider = BottomSliderModel::getSingle($id); // Ensure getSingle method exists in your model
        $bottom_slider->sub_title = trim($request->sub_title);
        $bottom_slider->title = trim($request->title);
        $bottom_slider->button_name = trim($request->button_name);
        $bottom_slider->button_link = trim($request->button_link);

        if (!empty($request->file('image_name'))) {
            $file = $request->file('image_name');

            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move(public_path('upload/bottom_slider/'), $filename);
            $bottom_slider->image_name = trim($filename);
        }

        $bottom_slider->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $bottom_slider->save();

        return redirect('admin/bottom_slider/list')->with('Success', "Bottom Slider Successfully Updated");
    }

    public function delete($id)
    {
        $bottom_slider = BottomSliderModel::getSingle($id);
        $bottom_slider->is_delete = 1;
        $bottom_slider->save();

        return redirect()->back()->with('Success', "Bottom Slider Successfully Deleted");
    }
}
