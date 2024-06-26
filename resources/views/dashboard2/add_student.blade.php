@extends('layouts.app')

@section('content')
<div class="relative mt-[50px]">
      <form enctype="multipart/form-data" action="/register/student" method="POST">
        @csrf
        @method('POST')
     <div class="container">
        <h3 class="text-3xl font-medium pt-3 pb-5">STUDENT REGISTER FORM</h3>
            <div class="group-form mb-3">
                <div class="file-upload" id="file-upload">
                    <input type="file" name="profile_picture" id="file-input">
                    <div id="upload-title">
                        <svg class="w-9 h-9 text-gray-300 m-auto dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01"/>
                        </svg>
                        <p>Upload a Picture</p>
                    </div>
                    <img src="#" id="file-preview" alt="Image Preview">
                </div>
            </div>
            {{-- program --}}
            <h4 class="text-xl pt-3 pb-3 font-medium">Programs</h4>
            <div class="flex w-full items-center justify-end">
                <div class="w-[50%]">
                    <div class="group-form mb-3">
						<input type="radio" class="w-6 h-6 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" name="program" value="national" required>
                        <label for="national" class="ms-2 text-lg font-normal text-gray-900 dark:text-gray-300">National</label>
                    </div>
                </div>
                <div class="w-[50%]">
                    <div class="group-form mb-3">
						<input type="radio" class="w-6 h-6 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" value="international" name="program" id="customCheckBox3" required="">
                        <label for="international" class="ms-2 text-lg font-normal text-gray-900 dark:text-gray-300">International</label>
                    </div>
                </div>
            </div>
            <h4 class="text-xl pt-3 pb-3 font-medium">Degree</h4>
            <div class="flex w-full items-center justify-end">
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="radio" name="degree" value="associate" class="w-6 h-6 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" required="">
                        <label for="associate" class="ms-2 text-lg font-normal text-gray-900 dark:text-gray-300">Associate</label>
                    </div>
                </div>
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="radio" name="degree" class="w-6 h-6 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" value="bacheolar" class="form-check-input" required>
                        <label for="Bachelor" class="ms-2 text-lg font-normal text-gray-900 dark:text-gray-300">Bachelor</label>
                    </div>
                </div>
            </div>
            {{-- Shift --}}
            <h4 class="text-xl pt-3 pb-3 font-medium">Shifts</h4>
            <div class="w-full flex items-center justify-end">
                <div class="w-[25%]">
                    <div class="group-form mb-3">
                        <input type="radio" name="shift" class="w-6 h-6 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" value="morning" class="form-check-input"  required="">
                        <label for="" class="ms-2 text-lg font-normal text-gray-900 dark:text-gray-300">Morning</label>
                    </div>
                </div>
                <div class="w-[25%]">
                    <div class="group-form mb-3">
                        <input type="radio" name="shift" class="w-6 h-6 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" value="afternoon" class="form-check-input ms-2" required="">
                        <label for="" class="ms-2 text-lg font-normal text-gray-900 dark:text-gray-300">Afternoon</label>
                    </div>
                </div>
                <div class="w-[25%]">
                    <div class="group-form mb-3">
                        <input type="radio" name="shift" class="w-6 h-6 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" value="evening" class="form-check-input"  id="customCheckBox3" required="">
                        <label for="" class="ms-2 text-lg font-normal text-gray-900 dark:text-gray-300">Evening</label>
                    </div>
                </div>
                <div class="w-[25%]">
                    <div class="group-form mb-3">
                        <input type="radio" name="shift" value="weekend" class="w-6 h-6 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"required="">
                        <label for="" class="ms-2 text-lg font-noraml text-gray-900 dark:text-gray-300">Weekend</label>
                    </div>
                </div>
            </div>
            {{-- end shift --}}
            <h4 class="text-xl font-medium pt-3 pb-3">Majors</h4>
            <div class="group-form mb-3">
                <select name="major" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="">
                    @foreach ($major as $m)
                        <option value="{{ $m->major_id }}">{{ $m->major_name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- end program --}}

            {{-- Persoanl background --}}
            <h4 class="text-xl font-medium pt-3 pb-3">Personal Background</h4>
            <div class="w-full flex items-center justify-end gap-3">
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="kh_name" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name in Khmer">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="latin_name" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name in Latin">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="date" name="DOB" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date Of Birth">
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-3">
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <select name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="">
                            <option value="male">Male</option>
                            <option value="famale">Famale</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="number" name="id_passport" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="" required placeholder="ID / Passport No">
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-3">
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="text" name="nationality" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nationality">
                    </div>
                </div>
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="text" name="country" required placeholder="Country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-3">
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="number" name="phone" required placeholder="Phone number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="email" name="email" required placeholder="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>
            <div class="group-form mb-3">
                <input type="text" name="current_address" required placeholder="Current Address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <h4 class="text-xl font-medium pt-3 pb-3">Current Address in Phnom Penh</h4>
            <div class="flex items-center justify-end gap-3">
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="address_name" required placeholder="Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="number" name="house_number" required placeholder="House number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="number" name="street" required placeholder="Street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 justify-end">
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="text" name="sangkat" required placeholder="Sangkat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="text" name="khan" required placeholder="Khan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>
            {{-- end personal background --}}
            {{-- Education background --}}
            <h4 class="text-xl font-medium pt-3 pb-3">Education Background</h4>
            <div class="flex items-center justify-end gap-3 pt-2 pb-2">
                <div class="w-[33%]">
                    <h5 class="fs-4 pt-2">Primary School(Grade 1-6)</h5>
                </div>
                <div class="w-[33%]">
                    <h5 class="fs-4 pt-2">Secondary School(Grade 7-9)</h5>
                </div>
                <div class="w-[33%]">
                    <h5 class="fs-4 pt-2">High School(Grade 10-12)</h5>
                </div>
            </div>
                {{-- school name --}}
            <div class="flex items-center justify-end gap-3">
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="primary_school_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Name's School">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="secondary_school_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Name's School">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="high_school_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Name's School">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="number" name="primary_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Years">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="number" name="secondary_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Years">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="number" name="high_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Years">
                    </div>
                </div>
            </div>
                
            <div class="flex items-center justify-end gap-3">
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="primary_city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Province / City">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="secondary_city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Province / City">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="group-form mb-3">
                        <input type="text" name="high_city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Province / City">
                    </div>
                </div>
            </div>
            {{-- end education background --}}
            {{-- family background --}}
            <h4 class="text-xl font-medium pt-3 pb-3">Family Background</h4>
            <div class="flex items-center justify-center gap-3">
                {{-- father's info --}}
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="text" name="father_name" required placeholder="Father's Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="w-[50%]">
                    <div class="group-form mb-3">
                        <input type="number" name="father_age" required placeholder="Age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <div class="w-[33%]">
                    <div class="gorup-form mb-3">
                        <input type="text" name="father_nationality" required placeholder="Nationality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="gorup-form mb-3">
                        <input type="text" name="father_coutry" required placeholder="Country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="w-[33%]">
                    <div class="gorup-form mb-3">
                        <input type="text" name="father_occupation" required placeholder="Occupation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>
                {{-- end father's info --}}
                {{-- mother's info --}}
                <div class="flex items-center justify-end gap-3">
                    <div class="w-[50%]">
                        <div class="group-form mb-3">
                            <input type="text" name="mother_name" required placeholder="Mother's Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="w-[50%]">
                        <div class="group-form mb-3">
                            <input type="number" name="mother_age" required placeholder="Age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3">
                    <div class="w-[33%]">
                        <div class="group-form mb-3">
                            <input type="text" name="mother_nationality" required placeholder="Nationaliry" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="w-[33%]">
                        <div class="group-form mb-3">
                            <input type="text" name="mother_country" required placeholder="Country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="w-[33%]">
                        <div class="group-form mb-3">
                            <input type="text" name="mother_occupation" required placeholder="Occupation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                {{-- end mother's info --}}
            </div>
            <div class="group-form mb-3">
                <input type="number" name="gphone" required placeholder="Guardian Phone Number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            {{-- end family background --}}
            <button type="submit" id="submit_form" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
    </form>
</div>
@endsection