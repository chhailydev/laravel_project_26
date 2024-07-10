<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAuditController extends Controller
{
    public function UserAudit(){
        $user = DB::table('users_account')->get();
        $major = DB::table('majors')->get();
        $audit = DB::table('user_audit_tbl')->paginate(8);

         foreach ($audit as $au) {
            $au->education_info = json_decode($au->education_info);
            $au->family_info = json_decode($au->family_info);
            $au->address_info = json_decode($au->address_info);
         }

        return view('dashboard2.user_audit', compact('audit', 'user', 'major'));
    }
}
