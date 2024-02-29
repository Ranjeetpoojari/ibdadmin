<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function admin(){
        return view ('admin.dashbord.index');
    }
    public function signin(){
        return view('admin.login');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);
     
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = ['email' => $request->email, 'password' => $request->password];
       
        if (Auth::attempt($credentials)) { 
            return redirect("admin/login")->with(["status"=>"failed", "msg"=>"invalid username"]);
        }
        else{
            return redirect("admin/dashboard")->with(["status"=>"success", "msg"=>"Login Success"]);  
            $user = User::where('email', $request->email)->first();

            if ($user) {
                // Log the attempt with invalid password
                \Log::info("Login attempt failed for user with email: {$request->email}. Invalid password provided.");
                return redirect("admin/login")->with(["status"=>"failed", "msg"=>"Invalid password"]);
            } else {
                // Log the attempt with invalid email
                \Log::info("Login attempt failed. User with email: {$request->email} not found.");
                return redirect("admin/login")->with(["status"=>"failed", "msg"=>"Invalid username"]);
            }
        }

    }

    public function logout(){
        Session::flush();
        return redirect('/admin/login');
    }

}
