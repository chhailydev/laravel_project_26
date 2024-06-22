<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentModel;
use DateTime;
use Illuminate\Support\Facades\DB;
use PDO;
use PhpParser\Node\Stmt\TryCatch;

class registrationsController extends Controller
{
    public function add_student(){
        $major = DB::table('majors')->get();
        return view('dashboard.add_student', compact('major'));
    }

    public function StudentRegister(Request $req)
{
    // Sample data for testing
    $nationality = $req->nationality;
    $kh_name = $req->kh_name;
    $address_info = json_encode([
        'current_address' => $req->current_address,
        'address_name' => $req->address_name,
        'house_number' => $req->house_number,
        'street' => $req->street,
        'sangkat' => $req->sangkat,
        'khan' => $req->khan,
    ]);
    $created_at = date('Y-m-d');
    $picture = null; // Binary data for the picture, set to null for testing
    if($req->has('profile_picture')){
        $image = $req->file('profile_picture');
        $picture = file_get_contents($image->getRealPath());
    }

    $family_info = json_encode([
        "father" => [
            'username' => $req->father_name,
            'age' => $req->father_age, // Ensure this is a number
            'nationality' => $req->nationality,
            'country' => $req->country,
            'occupation' => $req->father_occupation,
        ],
        "mother" => [
            'username' => $req->mother_name,
            'age' => $req->mother_age, // Ensure this is a number
            'nationality' => $req->nationality,
            'country' => $req->country,
            'occupation' => $req->mother_occupation,
        ]
    ]);
    $guardian_ph_number = $req->gphone;
    $email = $req->email;
    $shift = $req->shift;
    $degree = $req->degree;
    $country = $req->country;
    $program = $req->program;
    $latin_name = $req->latin_name;
    $dob = date('Y-m-d H:i:s');
    $major = intval($req->major);
    $gender = $req->gender;
    $education_info = json_encode([
        'primary_school_name' => $req->primary_school_name,
        'primary_city' => $req->primary_city,
        'primary_school_year' => intval($req->primary_year), // Ensure this is a number
        'secondary_school_name' => $req->secondary_school_name,
        'secondary_city' => $req->secondary_city,
        'secondary_school_year' => intval($req->secondary_year), // Ensure this is a number
        'high_school_name' => $req->high_school_name,
        'high_school_city' => $req->high_city,
        'high_school_year' =>  intval($req->high_year), // Ensure this is a number
    ]);
    $updated_at = date('Y-m-d');
    $phone_number = $req->phone;
    $id_passport = intval($req->id_passport);
    $id = 0;

    try {
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
        $stmt->bindParam(':p_PICTURE', $picture, \PDO::PARAM_LOB);
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
        $stmt->bindParam(':p_EDUCATION_INFO', $education_info);
        $stmt->bindParam(':p_UPDATED_AT', $updated_at);
        $stmt->bindParam(':p_ID', $id);
        $stmt->bindParam(':p_PHONE_NUMBER', $phone_number);
        $stmt->bindParam(':p_ID_PASSPORT', $id_passport);

        $stmt->execute();

        return redirect('/dashboard')->with('success', 'Successfully');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Failed to register student: '. $e->getMessage()]);
    }
}

public function getStudent(){
    $student = DB::table('students')->get();
    dd($student);
}

}
