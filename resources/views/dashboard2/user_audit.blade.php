@extends('layouts.app')

@section('content')
<div class="relative overflow-x-auto shadow-md top-[65px] sm:rounded-lg w-full">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-800">
        <span class="text-white font-medium text-2xl">User Audit</span>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 w-full uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    PERFORMED BY 
                </th>
                <th scope="col" class="px-6 py-3">
                    ACTION TYPE
                </th>
                <th scope="col" class="px-6 py-3">
                    STUDENT ID
                </th>
                <th scope="col" class="px-6 py-3">
                    KH NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    LATIN NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    GENDER
                </th>
                <th scope="col" class="px-6 py-3">
                    DOB
                </th>
                <th scope="col" class="px-6 py-3">
                    PHONE
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    PROGRAM
                </th>
                <th scope="col" class="px-6 py-3">
                    MAJORID
                </th>
                <th scope="col" class="px-6 py-3">
                    DEGREE
                </th>
                <th scope="col" class="px-6 py-3">
                    SHIFT
                </th>
                <th scope="col" class="px-6 py-3">
                    ID PASSPORT
                </th>
                <th scope="col" class="px-6 py-3">
                    NATIONALITY
                </th>
                <th scope="col" class="px-6 py-3">
                    COUNTRY
                </th>
                <th scope="col" class="px-6 py-3">
                    PRIMARY SCHOOL NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    PRIMARY SCHOOL YEAR
                </th>
                <th scope="col" class="px-6 py-3">
                    PRIMARY SCHOOL CITY
                </th>
                <th scope="col" class="px-6 py-3">
                    SECONDARY SCHOOL NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    SECONDARY SCHOOL YEAR
                </th>
                <th scope="col" class="px-6 py-3">
                    SECONDARY SCHOOL CITY
                </th>
                <th scope="col" class="px-6 py-3">
                    HIGT SCHOOL NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    HIGT SCHOOL YEAR
                </th>
                <th scope="col" class="px-6 py-3">
                    HIGT SCHOOL CITY
                </th>
                <th scope="col" class="px-6 py-3">
                    FATHER'S NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    FATHER'S AGE
                </th>
                <th scope="col" class="px-6 py-3">
                    FATHER'S NATIONALITY 
                </th>
                <th scope="col" class="px-6 py-3">
                    FATHER'S COUNTRY
                </th>
                <th scope="col" class="px-6 py-3">
                    FATHER'S OCCUPATION
                </th>
                <th scope="col" class="px-6 py-3">
                    MOTHER'S NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    MOTHER'S AGE
                </th>
                <th scope="col" class="px-6 py-3">
                    MOHTER'S NATIONALITY 
                </th>
                <th scope="col" class="px-6 py-3">
                    MOTHER'S COUNTRY
                </th>
                <th scope="col" class="px-6 py-3">
                    MOTHER'S OCCUPATION
                </th>
                <th scope="col" class="px-6 py-3">
                    REMARKS
                </th>
                <th scope="col" class="px-6 py-3">
                    PHOTO
                </th>
                <th scope="col" class="px-6 py-3">ACTION DATE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audit as $a)   
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-bold">
                        {{ $a->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->performed_by }}
                    </th>
                    <td class="px-6 py-4 font-bold
                        @if($a->action_type === 'INSERT')
                           text-blue-500
                        @elseif($a->action_type === 'AFTER UPDATE')
                           text-green-500
                        @elseif($a->action_type === 'BEFORE UPDATE')
                           text-green-500
                        @elseif($a->action_type === 'DELETE')
                           text-red-500
                        @endif
                    ">
                        {{ $a->action_type }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->student_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->kh_name }},
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->latin_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->gender }}
                    </td>
                    <td class="px-6 py-4">
                        {{$a->dob }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->phone_number}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->programs}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->major_id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->degrees }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->shift}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->id_passport }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->id_passport }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->country }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->primary_school_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->primary_city}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->primary_school_year}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->secondary_school_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->secondary_city}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->secondary_school_year}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->high_school_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->high_school_city}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->education_info->high_school_year}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->father->username}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->father->age}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->father->nationality}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->father->country}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->father->occupation}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->mother->username}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->mother->age}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->mother->nationality}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->mother->country}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->family_info->mother->occupation}}
                    </td>
                    <td class="px-6 py-4">
                        @if($a->picture)
                        <img src="{{ route('profile', ['id' => $a->student_id ])}}" alt="" class="w-10 h-10 rounded-full">
                        @else
                        <img src="{{ asset('assets/noImage.jpg')}}" alt="" class="w-10 h-10 rounded-full">
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ $a->action_date }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pt-3 pb-3">
        {{ $audit->links() }}
    </div>
</div>

@endsection