<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin';
        $data['latestUsers'] = User::orderBy('id', 'desc')->take(3)->get(); // Fetch latest 3 users
        return view('admin.admin.list', $data);
    }


    public function add()
    {
        $data['header_title'] = 'Add New Admin';
        return view('admin.admin.add' ,$data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email'=>'required|email|unique:users'
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->is_admin = 1; 

        if(!empty($request->file('image_name')))
        {
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/user/'), $filename);
            $user->image_name = trim($filename);
        }
        
        $user->save();

        return redirect('admin/admin/list')->with('Success', "Admin Successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title'] = 'Edit Admin';
        return view('admin.admin.edit' ,$data);
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }

        if(!empty($request->file('image_name')))
        {
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/user/'), $filename);
            $user->image_name = trim($filename);
        }

        $user->status = $request->status;
        $user->is_admin = 1; 
        $user->save();

        return redirect('admin/admin/list')->with('Success', "Admin Successfully Updated");
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('Success', "Record Successfully deleted");
    }

    public function customer_list(Request $request)
    {
        if(!empty($request->notify_id))
        {
            NotificationModel::updateReadNotify($request->notify_id);
        }
        $data['getRecord'] = User::getCustomer();
        $data['header_title'] = 'Customer';
        return view('admin.customer.list' ,$data);
    }

}