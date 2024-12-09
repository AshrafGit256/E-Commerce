<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Mail\ContactUsMail;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\SystemSettingModel;
use App\Models\ContactUsModel;
use App\Models\PartnerModel;
use App\Models\ProductModel;
use App\Models\SliderModel;
use App\Models\TopSliderModel;
use App\Models\BottomSliderModel;
use App\Models\BlogModel;
use App\Models\BlogCategoryModel;
use App\Models\BlogCommentModel;
use App\Models\HomeSettingModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(){
        $getPage = PageModel::getSlug('home');
        $data['getPage'] = $getPage;

        $data['getHomeSetting'] = HomeSettingModel::getSingle();

        $data['getBlog'] = BlogModel::getRecordActiveHome();
        $data['getSlider'] = SliderModel::getRecordActive();
        $data['getTopSlider'] = TopSliderModel::getRecordActive();
        $data['getBottomSlider'] = BottomSliderModel::getRecordActive();
        $data['getPartner'] = PartnerModel::getRecordActive();
        $data['getCategory'] = CategoryModel::getRecordActiveHome();

        $data['getProduct'] = ProductModel::getRecentArrival();

        $data['getProductTrendy'] = ProductModel::getProductTrendy();

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('home', $data);
    }

    public function recent_arrival_category_product(Request $request)
    {
        $getProduct = ProductModel::getRecentArrival();
        $getCategory = CategoryModel::getSingle($request->category_id);
        
        return response()->json([
            "status" => true,
            "success" => view("product._list_recent_arrival", [
                "getProduct" => $getProduct,
                "getCategory" => $getCategory,
            ])->render(),
        ], 200);
    }


    public function contact()
    {
        $first_number = mt_rand(0, 9);
        $second_number = mt_rand(0, 9);

        $data['first_number'] = $first_number;
        $data['second_number'] = $second_number;

        Session::put('total_sum', $first_number + $second_number);

        $getPage = PageModel::getSlug('contact');
        $data['getPage'] = $getPage;
        $data['getSystemSetting'] = SystemSettingModel::getSingle();
        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.contact', $data);
    }

    public function submit_contact(Request $request)
    {
        // Ensure both verification and session total_sum are provided
        if (!empty($request->verification) && !empty(Session::get('total_sum'))) {
            
            // Compare trimmed values for verification
            if (trim(Session::get('total_sum')) == trim($request->verification)) {
                
                // Create a new instance of the ContactUsModel
                $save = new ContactUsModel;
                
                // Check if the user is authenticated, and set the user_id accordingly
                if (Auth::check()) {
                    $save->user_id = Auth::user()->id;
                } else {
                    $save->user_id = null; // Set to null for guests instead of 0
                }
                
                // Assign trimmed form values to the model
                $save->name = trim($request->name);
                $save->email = trim($request->email);
                $save->phone = trim($request->phone);
                $save->subject = trim($request->subject);
                $save->message = trim($request->message);
                
                // Save the data
                $save->save();

                // Send email to the system's submission email
                $getSystemSetting = SystemSettingModel::getSingle();
                Mail::to($getSystemSetting->submit_email)->send(new ContactUsMail($save));

                // Redirect with success message
                return redirect()->back()->with('success', "Your information was successfully sent");
            } else {
                // Redirect with error message for incorrect verification sum
                return redirect()->back()->with('error', "Your verification sum is incorrect");
            }
        } else {
            // Redirect with error message for missing verification
            return redirect()->back()->with('error', "Your verification sum is missing");
        }
    }

    public function about()
    {
        $getPage = PageModel::getSlug('about');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.about', $data);
    }

    public function faq()
    {
        $getPage = PageModel::getSlug('faq');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.faq', $data);
    }

    public function payment_methods()
    {
        $getPage = PageModel::getSlug('payment-methods');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.payment_methods', $data);
    }

    public function money_back_guarantee()
    {
        $getPage = PageModel::getSlug('money-back-guarantee');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.money_back_guarantee', $data);
    }

    public function return()
    {
        $getPage = PageModel::getSlug('return');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.return', $data);
    }

    public function shipping()
    {
        $getPage = PageModel::getSlug('shipping');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.shipping', $data);
    }

    public function terms_conditions()
    {
        $getPage = PageModel::getSlug('terms-conditions');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.terms_conditions', $data);
    }

    public function privacy_policy()
    {
        $getPage = PageModel::getSlug('privacy-policy');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('page.privacy_policy', $data);
    }

    public function blog()
    {
        $getPage = PageModel::getSlug('blog');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        $data['getBlog'] = BlogModel::getBlog();
        $data['getBlogCategory'] = BlogCategoryModel::getRecordActive();
        $data['getPopular'] = BlogModel::getPopular(); 
        return view('blog.list', $data);
    }

    public function blog_detail($slug)
    {
        $getBlog = BlogModel::getSingleSlug($slug);
        if (!empty($getBlog)) 
        {
            $total_views = $getBlog->total_views; 
            $getBlog->total_views = $total_views + 1; 
            $getBlog->save(); 
            
            $data['getBlog'] = $getBlog;
            $data['meta_title'] = $getBlog->meta_title;
            $data['meta_description'] = $getBlog->meta_description;
            $data['meta_keywords'] = $getBlog->meta_keywords;
            $data['getBlogCategory'] = BlogCategoryModel::getRecordActive();

            $data['getPopular'] = BlogModel::getPopular(); 
            $data['getRelatedPost'] = BlogModel::getRelatedPost($getBlog->blog_category_id, $getBlog->id); 
            
            return view('blog.detail', $data);
        }
        
        else
        {
            //dd('Slug not found', $slug, $getBlog);
            abort(404);
        }
        
    }

    public function blog_category($slug)
    {
        $getCategory = BlogCategoryModel::getSingleSlug($slug);
        if (!empty($getCategory)) 
        {
            $data['getCategory'] = $getCategory;
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;

            $data['getBlogCategory'] = BlogCategoryModel::getRecordActive();
            $data['getPopular'] = BlogModel::getPopular(); 

            $data['getBlog'] = BlogModel::getBlog($getCategory->id);
            
            return view('blog.category', $data);
        }
        
        else
        {
            //dd('Slug not found', $slug, $getBlog);
            abort(404);
        }
        
    }

    
    public function submit_blog_comment(Request $request)
    {
        $comment = new BlogCommentModel;
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = trim($request->comment);
        $comment->save();

        return redirect()->back()->with('success', "Your Comment Has been successfully Submited");
    }

}
