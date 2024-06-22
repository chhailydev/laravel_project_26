@extends('layouts.master')

@section('content')
<div class="content-body">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form enctype="multipart/form-data" action="/register/student" method="POST">
        @csrf
        @method('POST')
     <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <span class="d-block fw-bold fs-2 text-primary">TEAVADA CITY</span>
            </div>
            <div class="col-6 text-end">
                <h4 class="fw-bold fs-2 text-primary">BACHELOR'S DEGRESS</h4>
            </div>
        </div>
            <div class="form-title mb-3">
                <span class="d-block fs-2">STUDENT REGISTRATION FROM</span>
            </div>
            <div class="group-form mb-3">
                <div class="file-upload" id="file-upload">
                    <input type="file" name="profile_picture" id="file-input">
                    <div id="upload-title">
                        <i class="fa-solid fa-cloud-arrow-up" style="font-size: 28px"></i>
                        <p>Upload a Picture</p>
                        <p>Drag and drop files here</p>
                    </div>
                    <img src="#" id="file-preview" alt="Image Preview">
                </div>
            </div>
            {{-- program --}}
            <div class="row">
                <h4 class="fs-4 fw-bold pt-3">Programs</h4>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
						<input type="radio" class="form-check-input" style="width: 30px; height: 30px; position: relative; top: -6px;" name="program" value="national" id="customCheckBox3" required="">
                        <label for="national" class="fs-4 ms-3">National</label>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
						<input type="radio" class="form-check-input" style="width: 30px; height: 30px; position: relative; top: -6px;" value="international" name="program" id="customCheckBox3" required="">
                        <label for="international" class="fs-4 ms-3">International</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="fs-4 fw-bold pt-3">Degree</h4>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="radio" name="degree" value="associate" class="form-check-input" style="width:30px; height: 30px; position: relative; top: -6px;" id="customCheckBox3" required="">
                        <label for="associate" class="fs-4 ms-3">Associate</label>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="radio" name="degree" value="bacheolar" class="form-check-input" style="width: 30px; height: 30px; position: relative; top: -6px;" id="customCheckBox3" required="">
                        <label for="Bachelor" class="fs-4 ms-3">Bachelor</label>
                    </div>
                </div>
            </div>
            {{-- Shift --}}
            <div class="row">
                <h4 class="fs-4 pt-3 fw-bold">Shifts</h4>
                <div class="col-xl-3">
                    <div class="group-form mb-3">
                        <input type="radio" name="shift" value="morning" class="form-check-input" style="width: 30px; height: 30px; position: relative; top:-6px;" id="customCheckBox3" required="">
                        <label for="" class="fs-4 ms-3">Morning</label>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="group-form mb-3">
                        <input type="radio" name="shift" value="afternoon" class="form-check-input ms-2" style="width: 30px; height: 30px; position: relative; top:-6px;" id="customCheckBox3" required="">
                        <label for="" class="fs-4 ms-3">Afternoon</label>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="group-form mb-3">
                        <input type="radio" name="shift" value="evening" class="form-check-input" style="width: 30px; height: 30px; position: relative; top:-6px;" id="customCheckBox3" required="">
                        <label for="" class="fs-4 ms-3">Evening</label>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="group-form mb-3">
                        <input type="radio" name="shift" value="weekend" class="form-check-input" style="width: 30px; height: 30px; position: relative; top:-6px;" id="customCheckBox3" required="">
                        <label for="" class="fs-4 ms-3">Weekend</label>
                    </div>
                </div>
            </div>
            {{-- end shift --}}
            <div class="group-form mb-3">
                <h4 class="fs-4 fw-bold">Majors</h4>
                <select name="major" class="form-control default-select wide" id="">
                    @foreach ($major as $m)
                        <option value="{{ $m->major_id }}">{{ $m->major_name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- end program --}}

            {{-- Persoanl background --}}
            <div class="row">
                <h4 class="fs-4 fw-bold">Personal Background</h4>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="text" name="kh_name" required class="form-control" placeholder="Name in Khmer">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="text" name="latin_name" required class="form-control" placeholder="Name in Latin">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="date" name="DOB" required class="form-control" placeholder="Date Of Birth">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <select name="gender" class="form-control default-select wide" id="">
                            <option value="male">Male</option>
                            <option value="famale">Famale</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="number" name="id_passport" class="form-control" id="" required placeholder="ID / Passport No">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="text" name="nationality" required class="form-control" placeholder="Nationality">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="text" name="country" required placeholder="Country" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="number" name="phone" required placeholder="Phone number" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="email" name="email" required placeholder="Email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="group-form mb-3">
                <input type="text" name="current_address" required placeholder="Current Address" class="form-control">
            </div>

            <div class="row">
                <h4 class="fw-bold fs-4">Current Address in Phnom Penh</h4>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="text" name="address_name" required placeholder="Name" class="form-control">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="number" name="house_number" required placeholder="House number" class="form-control">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="number" name="street" required placeholder="Street" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="text" name="sangkat" required placeholder="Sangkat" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="text" name="khan" required placeholder="Khan" class="form-control">
                    </div>
                </div>
            </div>
            {{-- end personal background --}}
            {{-- Education background --}}
            <div class="row">
                <h4 class="fw-bold fs-4">Education Background</h4>
                <div class="col-xl-4">
                    <h5 class="fs-4 pt-2">Primary School(Grade 1-6)</h5>
                </div>
                <div class="col-xl-4">
                    <h5 class="fs-4 pt-2">Secondary School(Grade 7-9)</h5>
                </div>
                <div class="col-xl-4">
                    <h5 class="fs-4 pt-2">High School(Grade 10-12)</h5>
                </div>
                {{-- school name --}}
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="text" name="primary_school_name" class="form-control" required placeholder="Name's School">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="text" name="secondary_school_name" class="form-control" required placeholder="Name's School">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="text" name="high_school_name" class="form-control" required placeholder="Name's School">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="number" name="primary_year" class="form-control" required placeholder="Years">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="number" name="secondary_year" class="form-control" required placeholder="Years">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="number" name="high_year" class="form-control" required placeholder="Years">
                    </div>
                </div>
                
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="text" name="primary_city" class="form-control" required placeholder="Province / City">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="group-form mb-3">
                        <input type="text" name="secondary_city" class="form-control" required placeholder="Province / City">
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="group-form mb-3">
                        <input type="text" name="high_city" class="form-control" required placeholder="Province / City">
                    </div>
                </div>
            </div>
            {{-- end education background --}}
            {{-- family background --}}
            <div class="row">
                <h4 class="fs-4 fw-bold ">Family Background</h4>
                {{-- father's info --}}
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="text" name="father_name" required placeholder="Father's Name" class="form-control">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="group-form mb-3">
                        <input type="number" name="father_age" required placeholder="Age" class="form-control">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="gorup-form mb-3">
                        <input type="text" name="father_nationality" required placeholder="Nationality" class="form-control">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="gorup-form mb-3">
                        <input type="text" name="father_coutry" required placeholder="Country" class="form-control">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="gorup-form mb-3">
                        <input type="text" name="father_occupation" required placeholder="Occupation" class="form-control">
                    </div>
                </div>
                {{-- end father's info --}}
                {{-- mother's info --}}
                    <div class="col-xl-6">
                        <div class="group-form mb-3">
                            <input type="text" name="mother_name" required placeholder="Mother's Name" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="group-form mb-3">
                            <input type="number" name="mother_age" required placeholder="Age" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="group-form mb-3">
                            <input type="text" name="mother_nationality" required placeholder="Nationaliry" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="group-form mb-3">
                            <input type="text" name="mother_country" required placeholder="Country" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="group-form mb-3">
                            <input type="text" name="mother_occupation" required placeholder="Occupation" class="form-control">
                        </div>
                    </div>
                {{-- end mother's info --}}
            </div>
            <div class="group-form mb-3">
                <input type="number" name="gphone" required placeholder="Guardian Phone Number" class="form-control">
            </div>
            {{-- end family background --}}
            <button type="submit" id="submit_form" class="btn btn btn-primary">SUBMIT</button>
    </form>
</div>
@endsection