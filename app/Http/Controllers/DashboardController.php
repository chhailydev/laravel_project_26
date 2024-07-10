<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $users = DB::table('users_account')->count();
        $stu = DB::table('students')->count();
        $role = DB::table('users_role')->count();
        return view("dashboard2.Dashboard", compact('users', 'stu', 'role'));
    }
}
