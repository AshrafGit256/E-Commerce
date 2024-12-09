<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopSliderModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TopSliderController extends Controller
{
    public function list()
    {
        $data['getRecord'] = TopSliderModel::getRecord();
        $data['header_title'] = 'Top Slider';
        return view('admin.top_slider.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Top Slider';
        return view('admin.top_slider.add', $data);
    }

    public function insert(Request $request)
    {
        $top_slider = new TopSliderModel;
        $top_slider->sub_title = trim($request->sub_title);
        $top_slider->title = trim($request->title);
        $top_slider->button_name = trim($request->button_name);
        $top_slider->button_link = trim($request->button_link);

        $file = $request->file('image_name');

        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move(public_path('upload/top_slider/'), $filename);

        $top_slider->image_name = trim($filename);
        $top_slider->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $top_slider->save();

        return redirect('admin/top_slider/list')->with('Success', "Top Slider  Successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = TopSliderModel::getSingle($id);
        $data['header_title'] = 'Edit Top Slider';
        return view('admin.top_slider.edit', $data);
    }

    public function update($id, Request $request)
    {
        $top_slider = TopSliderModel::getSingle($id); // Ensure getSingle method exists in your model
        $top_slider->sub_title = trim($request->sub_title);
        $top_slider->title = trim($request->title);
        $top_slider->button_name = trim($request->button_name);
        $top_slider->button_link = trim($request->button_link);

        if (!empty($request->file('image_name'))) {
            $file = $request->file('image_name');

            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move(public_path('upload/top_slider/'), $filename);
            $top_slider->image_name = trim($filename);
        }

        $top_slider->status = $request->status ?? 0; // Set a default value (e.g., 0) if status is empty
        $top_slider->save();

        return redirect('admin/top_slider/list')->with('Success', "Top Slider Successfully Updated");
    }

    public function delete($id)
    {
        $top_slider = TopSliderModel::getSingle($id);
        $top_slider->is_delete = 1;
        $top_slider->save();

        return redirect()->back()->with('Success', "Top Slider Successfully Deleted");
    }
}
