<?php

namespace App\Http\Controllers;

use App\Models\UserAccount;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDO;

class LoginPageController extends Controller
{
    public function loginPage(){
        return view("dashboard.login");
    }

    public function registerPage(){
        $role = DB::table('users_role')->get();
        return view("dashboard.register", compact('role'));
    }

     public function createAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $username = $request->input('username');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $role_id = $request->input('role');

        $fileData = null;

        if ($request->has('profile')) {
            $image = $request->file('profile');
            $fileData = file_get_contents($image->getRealPath());
        }

        $currentDateTime = new DateTime();
        $createdAt = $currentDateTime->format('Y-m-d');
        $updatedAt = $currentDateTime->format('Y-m-d');


            $pdo = DB::getPdo();
            $stmt = $pdo->prepare('BEGIN USERS_ACCOUNT_TAPI.ins(:p_PROFILE, :p_PASSWORD, :p_CREATED_AT, :p_USERANME, :p_ROLE_ID, :p_UPDATED_AT ,:p_ID, :p_EMAIL); END;');

            $p_status = 'publish';
            $p_id = 0;

            $stmt->bindParam(':p_PROFILE', $fileData, PDO::PARAM_LOB);
            $stmt->bindParam(':p_PASSWORD', $password);
            $stmt->bindParam(':p_CREATED_AT', $createdAt);
            $stmt->bindParam(':p_USERANME', $username);
            $stmt->bindParam(':p_ROLE_ID', $role_id);
            $stmt->bindParam(':p_UPDATED_AT', $updatedAt);
            $stmt->bindParam(':p_ID', $p_id);
            $stmt->bindParam(':p_EMAIL', $email);

            $stmt->execute();

            return redirect('/dashboard/account')->with(['success' => 'Created new user with ID: ' . $p_id], 201);
    } 

    public function getAllAccount(){
        $accounts = DB::table('user_roles_view')->get();
        $role = DB::table('users_role')->get();
        return view('dashboard2.user_accounts', compact('accounts', 'role'));
    }

    public function serverProfileImage($id){

        $account = DB::table('users_account')->where('id', $id)->first();

        if($account && $account->profile){
            $contentType = $this->getContentType($account->profile);
            return response($account->profile, 200)->header('Content-Type', $contentType);
        }

        abort(404);
    }

    // public function registerUser(Request $request){
    //     $username = $request->input("username");
    //     $email = $request->input("email");
    //     $password = Hash::make($request->input("password")); 

    //     $validator = Validator::make($request->all(), [
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if($validator->fails()){
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $user = DB::table('users')->insert([
    //         'name' => $username,
    //         'email' => $email,
    //         'password' => $password,
    //     ]);

    //     if($user){
    //         return redirect()->route('dashboard')->with('success', 'User registered successfully');
    //     }

    //     return redirect()->route('login')->with('error', 'User registration failed');

    // }

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


        $user = DB::table('users_account')->where('email', $email)->first();

        // dd($email, $password, $user->email, Hash::check($password, $user->password));

        if ($user && Hash::check($password, $user->password)) {
            Auth::loginUsingId($user->id);
            return redirect()->intended('dashboard')->with('success', 'User logged in successfully');
        }

        return redirect()->route('login')->with('error', 'User login failed');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'User logged out successfully');
    }

    private function getContentType($filename){
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        switch($extension){
            case 'jpg':
            case 'jpeg':
                return 'image/jpeg';
            case 'png':
                return 'image/png';
            case 'gif':
                return 'image/gif';
            case 'pdf':
                return 'application/pdf';
            case 'doc':
            case 'docx':
                return 'application/msword';
            case 'xls':
            case 'xlsx':
                return 'application/vnd.ms-excel';
            default:
                return 'application/octet-stream';
        }
    }
}
