<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class majorController extends Controller
{
    public function majors(){
        $major = DB::table('majors')->get();
        return view('dashboard.majors', compact('major'));
    }

    public function create_major(Request $request){
        $validate = Validator::make($request->all(), [
            'major' => 'required',
        ]);

        if($validate->fails()){
            return response()->json(['status' => 'error']);
        }

        $major = $request->major;
        $date = new DateTime();
        $createdAt = $date->format('Y-m-d');
        $updatedAt = $date->format('Y-m-d');
        $id = 0;

        DB::statement('
        BEGIN MAJORS_TAPI.INS(
                :p_CREATED_AT, 
                :p_MAJOR_NAME, 
                :p_MAJOR_ID, 
                :p_UPDATED_AT
            ); 
        END;',[
            'p_CREATED_AT' => $createdAt, 
            'p_MAJOR_NAME' => $major, 
            'p_MAJOR_ID' => $id,
            'p_UPDATED_AT' => $updatedAt,
        ]);

        return redirect('/major')->with(['success' => 'Created new major'], 201);

    }
}
