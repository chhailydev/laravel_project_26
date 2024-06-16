<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentModel;
use DateTime;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class registrationsController extends Controller
{
    public function add_student(){
        $major = DB::table('majors')->get();
        return view('dashboard.add_student', compact('major'));
    }

    public function RegisterStudent(Request $request){

            $kh_name = $request->kh_name;
            $latin_name = $request->latin_name;
            $gender = $request->gender;
            $dob = $request->DOB;
            $phone = $request->phone;
            $email = $request->email;
            $program = $request->program;
            $major = intval($request->major);
            $degree = $request->degree;
            $shift = $request->shift;
            $id_passport = intval($request->id_passport);
            $nationality = intval($request->nationality);
            $country = $request->country;
            $guardian_ph_number = $request->guardian_ph_number;

            $family_info = json_encode([
                "father" => [
                    'username' => $request->father_name,
                    'age' => intval($request->father_age),
                    'nationality' => $request->nationality,
                    'country' => $request->country,
                    'occaption' => $request->father_occupation,
                ],
                "mother" => [
                    'username' => $request->mother_name,
                    'age' => intval($request->mother_age),
                    'nationality' => $request->nationality,
                    'country' => $request->country,
                    'occaption' => $request->mother_occupation,
                ]
            ]);

            $address_info = json_encode([
                'current_address' => $request->current_address,
                'address_name' => $request->address_name,
                'house_number' => $request->house_number,
                'street' => $request->street,
                'sangkat' => $request->sangkat,
                'khan' => $request->khan,
            ]);

            $edu_background = json_encode([
                'primary_school_name' => $request->primary_school_name,
                'primary_city' => $request->primary_city,
                'primary_school_year' => intval($request->primary_year),
                'secondary_school_name' => $request->secondary_school_name,
                'secondary_city' => $request->secondary_city,
                'secondary_school_year' => intval($request->secondary_year),
                'high_school_name' => $request->high_school_name,
                'high_school_city' => $request->high_city,
                'high_school_year' => intval($request->high_year),

            ]);

            $id = 0;
            $date = new DateTime();
            $created_at = $date->format('Y-m-d');
            $updated_at = $date->format('Y-m-d');
            
            $filename = null;
            $fileData = null;

            if ($request->has('profile_picture')){
                $image = $request->file('profile_picture');
                $filename = time() . '_' . $image->getClientOriginalName();
                // Store the image file
                $path = $image->storeAs('student', $filename, 'public');

                // Read the file contents to store in the databse
                $fileData = file_get_contents($image->getRealPath());
            }


        try{

            $pdo = DB::getPdo();
            $stmt = $pdo->prepare('
                BEGIN STUDENTS_TAPI.INS(
                    :p_NATIONALITY,
                    :p_KH_NAME,
                    :p_ADDRESS_INFO,
                    :p_CREATED_AT,
                    :p_PICTURE,
                    :p_FAMILY_INFO,
                    :p_GURARDIAN_PHONE_NUMBER,
                    :p_EMAIL,
                    :p_SHIFT,
                    :p_DEGREES,
                    :p_COUNTRY,
                    :p_PROGRAMS,
                    :p_LATIN_NAME,
                    :p_DOB,
                    :p_MAJOR_ID,
                    :p_GENDER,
                    :p_EDUCATION_INFO,
                    :p_UPDATED_AT,
                    :p_ID,
                    :p_PHONE_NUMBER,
                    :p_ID_PASSPORT);
                END;
            ');

            $stmt->bindParam(':p_NATIONALITY', $nationality);
            $stmt->bindParam(':p_KH_NAME', $kh_name);
            $stmt->bindParam(':p_ADDRESS_INFO', $address_info);
            $stmt->bindParam(':p_CREATED_AT', $created_at);
            $stmt->bindParam(':p_PICTURE', $fileData);
            $stmt->bindParam(':p_FAMILY_INFO', $family_info);
            $stmt->bindParam(':p_GURARDIAN_PHONE_NUMBER', $guardian_ph_number);
            $stmt->bindParam(':p_EMAIL', $email);
            $stmt->bindParam(':p_SHIFT', $shift);
            $stmt->bindParam(':p_DEGREES', $degree);
            $stmt->bindParam(':p_COUNTRY', $country);
            $stmt->bindParam(':p_PROGRAMS', $program);
            $stmt->bindParam(':p_LATIN_NAME', $latin_name);
            $stmt->bindParam(':p_DOB', $dob);
            $stmt->bindParam(':p_MAJOR_ID', $major);
            $stmt->bindParam(':p_GENDER', $gender);
            $stmt->bindParam(':p_EDUCATION_INFO', $edu_background);
            $stmt->bindParam(':p_UPDATED_AT', $updated_at);
            $stmt->bindParam(':p_ID', $id);
            $stmt->bindParam(':p_PHONE_NUMBER', $phone);
            $stmt->bindParam(':p_ID_PASSPORT', $id_passport);

            $stmt->execute();

            return redirect('/dashboard')->with(['msg' => 'Student registered successfully']);

        }catch(\Exception $e){

        }

    }
}
