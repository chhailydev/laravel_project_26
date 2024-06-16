<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function Roles(){
        return view('dashboard.create_role');
    }

    public function create_role(Request $request){
        $validate = Validator::make($request->all(), [
            'role' =>'required'
        ]);

        if($validate->fails()){
            return response()->json(['status' => 'error']);
        }

        $role = $request->role;
        $id = 0;
        $currentDateTime = new DateTime();
        $createdAt = $currentDateTime->format('Y-m-d');
        $updatedAt = $currentDateTime->format('Y-m-d');

        try{
            DB::statement('
            BEGIN USERS_ROLE_TAPI.INS(
                    :p_ROLE, 
                    :p_CREATED_AT, 
                    :p_UPDATED_AT, 
                    :p_ID
                ); 
            END;', [
                'p_ROLE' => $role,
                'p_CREATED_AT' => $createdAt,
                'p_UPDATED_AT' => $updatedAt,
                'p_ID' => $id
            ]);

            return redirect('/');
        }catch(\Exception $e){
            Log::error('Error calling procedure: ' . $e->getMessage());
            return back()->withErrors(['msg' => "Error inserting data"]);
        }
    }

    public function listRole(){
        
    }
}
