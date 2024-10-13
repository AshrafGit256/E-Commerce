<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    // Customer registration
    public function auth_login(Request $request)
    {
        $remember = !empty($request->is_remember) ? true : false;

        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password,  
            'status' => 0, 
            'is_delete' => 0
        ], $remember)) 
        {
            if(!empty(Auth::user()->email_verified_at))
            {
                $json['status'] = true;
                $json['message'] = 'success';
            }
            else
            {
                $save = User::getSingle(Auth::user()->id);
                Mail::to($save->email)->send(new RegisterMail($save));
                Auth::logout();
                $json['status'] = false;
                $json['message'] = 'your account is not verified, Please check your inbox and verify';
            }
            
        } 
        
        else 
        {
            $json['status'] = false;
            $json['message'] = 'Please enter correct email and password';
        }

        echo json_encode($json);
    }

    // Admin registration
    public function auth_register(Request $request)
    {
        $checkEmail = User::checkEmail($request->email);  // Corrected method
        if(empty($checkEmail)) {
            $save = new User;
            $save->name = trim($request->name);
            $save->email = trim($request->email);  // You should also store the email
            $save->password = Hash::make($request->password);
            $save->save();

            Mail::to($save->email)->send(new RegisterMail($save));

            $json['status'] = true;
            $json['message'] = "Your account has been successfully created. Please verify your email address";
        } 
        else 
        {
            $json['status'] = false;
            $json['message'] = "Email already taken, please choose another email";
        }

        echo json_encode($json);
    }

    public function activate_email($id)
    {
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect(url(''))->with('success', "Email successfully verified");
    }

    public function forgot_password(Request $request)
    {
        $data['meta_title'] = "Forgot Password";
        return view('admin.auth.forgot', $data);
    }
    
    public function auth_forgot_password(Request $request)
    {
        // Validate the request input to ensure the email is valid
        $request->validate([
            'email' => 'required|email', // Removed the exists rule from validation
        ]);

        // Find the user based on the email
        $user = User::where('email', $request->email)->first(); // Get the first user with the provided email

        // Check if the user was found
        if ($user) {
            // Generate a random token for password reset
            $user->remember_token = Str::random(30);
            $user->save();
        
            // Send the ForgotPasswordMail to the user's email
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
        
            // Redirect back with a success message
            return redirect()->back()->with('success', "Password reset email has been sent.");
        } else {
            // Redirect back with an error message if email not found
            return redirect()->back()->with('error', "Email not found in the system.");
        }
    }

    public function reset($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user))
        {
            $data['user'] = $user;
            $data['meta_title'] = "Reset Password";
            return view('admin.auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function auth_reset($token, Request $request)
{
    // Validate the input to ensure passwords are filled
    $request->validate([
        'password' => 'required|min:8', // Ensure password is at least 8 characters
        'cpassword' => 'required|same:password', // Ensure confirmation matches the password
    ]);

    // Find the user with the provided token
    $user = User::where('remember_token', '=', $token)->first();

    if ($user) {
        // If passwords match, hash the new password and reset the remember token
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(30); // Change token to prevent reuse
        $user->save();

        return redirect(url(''))->with('success', "Password successfully reset.");
    } else {
        // If no user is found, redirect with an error message
        return redirect(url(''))->with('error', "Invalid token or user not found.");
    }
}


}
