<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\SystemSettingModel;
use App\Models\ContactUsModel;
use App\Models\HomeSettingModel;
use Database\Seeders\SystemSettingSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function contactUs()
    {
        $data['getRecord'] = ContactUsModel::getRecord();
        $data['header_title'] = 'Contact Us';
        return view('admin.contactUs.list', $data);
    }

    public function contactUs_delete($id)
    {
        ContactUsModel::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', "Record Successfully Deleted");
    }

    public function list()
    {
        $data['getRecord'] = PageModel::getRecord();
        $data['header_title'] = 'Page';
        return view('admin.page.list', $data);
    }

    public function edit($id)
    {
        $data['getRecord'] = PageModel::getSingle($id);
        $data['header_title'] = 'Edit Page';
        return view('admin.page.edit', $data);
    }

    public function update($id, Request $request)
    {
        $page = PageModel::getSingle($id); 
        $page->name = trim($request->name);
        $page->title = trim($request->title);
        $page->description = trim($request->description);
        $page->meta_title = trim($request->meta_title);
        $page->meta_description = trim($request->meta_description);
        $page->meta_keywords = trim($request->meta_keywords);
        $page->save();

            if(!empty($request->file('image')))
            {   
                $file = $request->file('image'); 
                $ext = $file->getClientOriginalExtension();            
                $randomStr = $page->id.Str::random(20);
                $filename = strtolower($randomStr).'.'.$ext;
                $file->move(public_path('upload/page/'), $filename);

                $page->image_name = trim($filename);
                $page->save();
            }

        return redirect('admin/page/list')->with('success', "Page Successfully Updated");
    }

    public function system_setting()
    {
        $data['getRecord'] = SystemSettingModel::getSingle();
        $data['header_title'] = 'System Setting';
        return view('admin.setting.system_setting', $data);
    }

    public function home_setting()
    {
        $data['getRecord'] = HomeSettingModel::getSingle();
        $data['header_title'] = 'Home Setting';
        return view('admin.setting.home_setting', $data);
    }

    public function update_system_setting(Request $request)
    {
        $save = SystemSettingModel::getSingle();
        $save->website_name = trim($request->website_name);
        $save->footer_description = trim($request->footer_description);
        $save->address = trim($request->address);
        $save->working_hours = trim($request->working_hours);
        $save->phone = trim($request->phone);
        $save->phone_two = trim($request->phone_two);
        $save->submit_email = trim($request->submit_email);
        $save->email = trim($request->email);
        $save->email_two = trim($request->email_two);
        $save->facebook_link = trim($request->facebook_link);
        $save->twitter_link = trim($request->twitter_link);
        $save->instagram_link = trim($request->instagram_link);
        $save->youtube_link = trim($request->youtube_link);
        $save->pinterest_link = trim($request->pinterest_link);
        $save->website_name = trim($request->website_name);

        if(!empty($request->file('logo')))
        {   
            $file = $request->file('logo'); 
            $ext = $file->getClientOriginalExtension();            
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/setting/'), $filename);
            $save->logo = trim($filename);
        }

        if(!empty($request->file('favicon')))
        {   
            $file = $request->file('favicon'); 
            $ext = $file->getClientOriginalExtension();            
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/setting/'), $filename);
            $save->favicon = trim($filename);
        }

        if(!empty($request->file('footer_payment_icon')))
        {   
            $file = $request->file('footer_payment_icon'); 
            $ext = $file->getClientOriginalExtension();            
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/setting/'), $filename);
            $save->footer_payment_icon = trim($filename);
        }


        $save->save();

        return redirect()->back()->with('success', "Setting Successfully Updated");
    }

    public function update_home_setting(Request $request)
    {
        $save = HomeSettingModel::getSingle();
        $save->trendy_product_title = trim($request->trendy_product_title);
        $save->shop_by_category_title = trim($request->shop_by_category_title);
        $save->recent_arrival_title = trim($request->recent_arrival_title);
        $save->blog_title = trim($request->blog_title);
        $save->payment_delivery_title = trim($request->payment_delivery_title);
        $save->payment_delivery_description = trim($request->payment_delivery_description);
        $save->refund_title = trim($request->refund_title);
        $save->refund_description = trim($request->refund_description);
        $save->support_title = trim($request->support_title);
        $save->support_description = trim($request->support_description);
        $save->signup_title = trim($request->signup_title);
        $save->signup_description = trim($request->signup_description);
        
       
        if(!empty($request->file('payment_delivery_image')))
        {   
            $file = $request->file('payment_delivery_image'); 
            $ext = $file->getClientOriginalExtension();            
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/setting/'), $filename);
            $save->payment_delivery_image = trim($filename);
        }

        if(!empty($request->file('refund_image')))
        {   
            $file = $request->file('refund_image'); 
            $ext = $file->getClientOriginalExtension();            
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/setting/'), $filename);
            $save->refund_image = trim($filename);
        }

        if(!empty($request->file('support_image')))
        {   
            $file = $request->file('support_image'); 
            $ext = $file->getClientOriginalExtension();            
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/setting/'), $filename);
            $save->support_image = trim($filename);
        }

        if(!empty($request->file('signup_image')))
        {   
            $file = $request->file('signup_image'); 
            $ext = $file->getClientOriginalExtension();            
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/setting/'), $filename);
            $save->signup_image = trim($filename);
        }

        $save->save();

        return redirect()->back()->with('success', "Home Setting Successfully Updated");
    }
}
