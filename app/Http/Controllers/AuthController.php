<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Hash;

class AuthController extends Controller
{
    // Admin login page
    public function login_admin()
    {
        if(Auth::check() && Auth::user()->is_admin == 1) {
            return redirect('admin/dashboard');
        }

        return view('admin.auth.login');
    }

    // Handle admin login
    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password, 
            'is_admin' => 1, 
            'status' => 0, 
            'is_delete' => 0
        ], $remember)) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', "Please enter correct email and password"); 
        }
    }

    // Logout admin
    public function logout_admin()
    {
        Auth::logout();
        return redirect('/');
    }

    // Admin registration
    public function auth_register(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();  // Corrected method
        if(empty($checkEmail)) {
            $save = new User;
            $save->name = trim($request->name);
            $save->email = trim($request->email);  // You should also store the email
            $save->password = Hash::make($request->password);
            $save->save();

            Mail::to($save->email)->send(new RegisterMail($save));

            $json['status'] = true;
            $json['message'] = "Your account has been successfully created";
        } else {
            $json['status'] = false;
            $json['message'] = "Email already taken, please choose another email";
        }

        return response()->json($json);
    }
}
