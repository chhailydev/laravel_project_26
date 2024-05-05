<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginPageController extends Controller
{
    public function loginPage(){
        return view("dashboard.login");
    }

    public function registerPage(){
        return view("dashboard.register");
    }

    public function registerUser(Request $request){
        $username = $request->input("username");
        $email = $request->input("email");
        $password = Hash::make($request->input("password")); 

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = DB::table('users')->insert([
            'name' => $username,
            'email' => $email,
            'password' => $password,
        ]);

        if($user){
            return redirect()->route('dashboard')->with('success', 'User registered successfully');
        }

        return redirect()->route('login')->with('error', 'User registration failed');

    }

    public function login(Request $request){
        $email = $request->input("email");
        $password = $request->input("password");

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = DB::table('users')->where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::loginUsingId($user->id);
            return redirect()->route('dashboard')->with('success', 'User logged in successfully');
        }

        return redirect()->route('login')->with('error', 'User login failed');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'User logged out successfully');
    }
}
