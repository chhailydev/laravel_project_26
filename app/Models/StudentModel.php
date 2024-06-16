<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;

    protected $connection = 'oracle';

    protected $table = 'students';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kh_name',
        'latin_name',
        'gender',
        'DOB',
        'phone_number',
        'email',
        'program',
        'major_id',
        'degree',
        'shift',
        'id_passport',
        'nationality',
        'country',
        'picture',
        'education_info',
        'family_info',
        'address_info',
        'guardian_phone_number',
    ];


}
