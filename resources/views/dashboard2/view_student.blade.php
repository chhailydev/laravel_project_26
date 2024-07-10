<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <style>
         @page {
            size: A4;
            margin: 2mm;
        }
        @media print {
            body {
                margin: 0;
            }
            .page-break {
                page-break-before: always;
            }
            #print_report {
                display: none;
            }
            #print_cancel{
                display: none
            }
        }
     </style>
    <title>REPORT</title>
</head>
<body>
    <div class="flex w-full items-center justify-end p-5 gap-5">
        <button type="button" id="print_cancel" class="text-white bg-gray-300 hover:bg-gray-400 focus:ring-teal-100 focus:outline-none font-medium text-sm py-2.5 rounded-lg px-5">
            <a href="/dashboard/list/students">Cancel</a>
        </button>
        <button type="submit" id="print_report" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print Report</button>
    </div>
    <div class="relative m-auto" style="width: 210mm; height: 297mm;">
        <h2 class="text-xl text-center text-blue-800 font-medium">ADMINSSION SLIP</h2>
        <div class="flex items-center justify-between">
            <div>
                <table class="text-blue-800">
                    <tr class="text-start font-medium">
                        <td>PROGRAM: </td>
                        <td class="uppercase">{{ $stu['program']}}</td>
                    </tr>
                    <tr class="text-start font-medium">
                        <td>DEGREE:</td>
                        <td class="uppercase">{{ $stu['degree']}}</td>
                    </tr>
                    <tr class="text-start font-medium">
                        <td>MAJOR:</td>
                        @foreach ($major as $m)
                            @if($m->major_id == $stu['major_id'])
                                <td class="uppercase">{{ $m->major_name }}</td>
                            @endif
                        @endforeach
                    </tr>
                    <tr class="text-start font-medium">
                        <td>SHIFT</td>
                        <td class="uppercase">{{ $stu['shift']}}</td>
                    </tr>
                </table>
            </div>
            @if($stu['picture'])
                <img src="{{ route('profile', ['id' => $stu['id'] ])}}" alt="" width="100px" height="150px">
            @else
                <img src="{{ asset('assets/noImage.jpg')}}" alt="">
            @endif
        </div>

        {{-- Personal background --}}
        <div class="mt-[10px] text-[12px]">
            <table class="border w-full font-medium text-blue-800 border-collapse">
                <tr class="border">
                    <th class="bg-blue-800 text-start ps-2 text-white pt-2 pb-2">ផ្នែកទី ២ | Section 2 :</th>
                    <th class="text-start text-blue-800 ps-2">ប្រវត្តិរូបសង្ខេប​ | Personal Background</th>
                </tr>
                <tr class="border">
                    <td class="p-2">ឈ្មោះជាភាសាខ្មែរ Name in Khmer</td>
                    <td class="p-2">: {{ $stu['kh_name'] }}</td>
                    <td class="p-2">ភេទ​ Sex</td>
                    <td class="p-2">: {{ $stu['gender']}}</td>
                </tr>
                <tr class="border">
                    <td class="p-2">ឈ្មោះជាអក្សរឡាតាំង Name in Latin </td>
                    <td class="p-2">: {{ $stu['latin_name']}}</td>
                </tr>
                <tr class="border">
                    <td class="p-2">លេខអត្តសញ្ញាណប័ណ្ណ/លិខិតឆ្លងដែន ID/Passport No</td>
                    <td class="p-2">: {{$stu['id_passport']}}</td>
                </tr>
                <tr class="border">
                    <td class="p-2">សញ្ញាត្តិ Nationality</td>
                    <td class="p-2">: {{$stu['nationality']}}</td>
                    <td class="p-2">ប្រទេស Country</td>
                    <td class="p-2">: {{$stu['country']}}</td>
                </tr>
                <tr class="border">
                    <td class="p-2">ថ្ងៃខែកំណើត Date of Birth</td>
                    <td class="p-2">: {{$stu['dob']}}</td>
                </tr>
                <tr class="border">
                    <td class="p-2">ទីកន្លែងកំណើត Place of Birth</td>
                    <td class="p-2">: {{ $stu['address_info']->current_address}}</td>
                </tr>
                <tr class="border">
                    <td class="p-2">លេខទូរស័ទ្ទ Phone Number</td>
                    <td class="p-2">: {{ $stu['phone_number']}}</td>
                    <td class="p-2">អ៊ីម៉ែល Email:</td>
                    <td class="p-2">{{ $stu['email']}}</td>
                </tr>
                <tr class="border">
                    <td class="p-2">អាស័យដ្ឋានទំនាក់ទំនងនៅភ្នំពេញ​​<br>Current Address in Phnom Pehn</td>
                    <td class="p-2 " colspan="2">ឈ្មោះ Name: {{$stu['address_info']->address_name}} &nbsp; ផ្ទះលេខ #: {{$stu['address_info']->house_number}} &nbsp; ផ្លូវលេខ St: {{$stu['address_info']->street}} <br> សង្កាត់ Sangkat: {{$stu['address_info']->sangkat}} &nbsp; ខណ្ឌ Khan: {{$stu['address_info']->khan}}</td>
                </tr>
            </table>

            {{-- education background --}}
            <table class="border w-full text-blue-800 font-medium">
                <tr class="border">
                    <th class="bg-blue-800 text-start ps-2 text-white pt-2 pb-2">ផ្នែកទី​៣ | Section 3 :</th>
                    <th class="text-start text-blue-800 ps-2">អំពីការសិក្សារ | Education Background</th>
                </tr>
                <tr class="text-center">
                    <td class="p-2">គ្រឺះស្ថានសិក្សា <br> Institution Attended</td>
                    <td class="p-2">បឋមសិក្សារ <br> Primary School (Grade 1-6)</td>
                    <td class="p-2">មធ្យមសិក្សាបឋមភូមិ <br> Secondary School (Grade 7-9)</td>
                    <td class="p-2">មធ្យមសិក្សាទុតិយភូមិ <br> High School (Grade 10 -12)</td>
                </tr>
                <tr class="border">
                    <td class="p-3">ឈ្មោះសាលា Name of School</td>
                    <td class="p-3">: {{$stu['edu_info']->primary_school_name}}</td>
                    <td class="p-3">: {{$stu['edu_info']->secondary_school_name}}</td>
                    <td class="p-3">: {{$stu['edu_info']->high_school_name}}</td>
                </tr>
                <tr class="border">
                    <td class="p-3">ឆ្នាំសិក្សារ Academic Year</td>
                    <td class="p-3">: {{$stu['edu_info']->primary_school_year}}</td>
                    <td class="p-3">: {{$stu['edu_info']->secondary_school_year}}</td>
                    <td class="p-3">: {{$stu['edu_info']->high_school_year}}</td>
                </tr>
                <tr class="border">
                    <td class="p-3">ខេត្ត​ / ក្រុង  Province / City</td>
                    <td class="p-3">: {{$stu['edu_info']->primary_city}}</td>
                    <td class="p-3">: {{$stu['edu_info']->secondary_city}}</td>
                    <td class="p-3">: {{$stu['edu_info']->high_school_city}}</td>
                </tr>
            </table>

            <table class="border w-full text-blue-800">
                <tr class="border">
                    <th class="bg-blue-800 text-start ps-2 text-white pt-2 pb-2">ផ្នែកទី​៤ | Section 4 :</th>
                    <th class="text-start text-blue-800 ps-2">អំពីគ្រួសារ​ | Family Background</th>
                </tr>
                <tr class="border">
                    <td class="p-3">ឈ្មោះឪពុក Father's Name</td>
                    <td class="p-3">: {{$stu['family_info']->father->username}}</td>
                    <td class="p-3">អាយុ Age</td>
                    <td class="p-3">: {{$stu['family_info']->father->age}}</td>
                </tr>
                <tr class="border">
                    <td class="p-3">សញ្ញាត្តិ​​​ Nationality</td>
                    <td class="p-3">: {{$stu['family_info']->father->nationality}}</td>
                    <td class="p-3">ប្រទេស​ Country</td>
                    <td class="p-3">: {{$stu['family_info']->father->country}}</td>
                    <td class="p-3">មុខរបរ​​​ Occupation</td>
                    <td class="p-3">: {{$stu['family_info']->father->occupation}}</td>
                </tr>
                <tr class="border">
                    <td class="p-3">ឈ្មោះម្ដាយ Mother's Name</td>
                    <td class="p-3">: {{$stu['family_info']->mother->username}}</td>
                    <td class="p-3">អាយុ Age</td>
                    <td class="p-3">: {{$stu['family_info']->mother->age}}</td>
                </tr>
                <tr class="border">
                    <td class="p-3">សញ្ញាត្តិ​​​ Nationality</td>
                    <td class="p-3">: {{$stu['family_info']->mother->nationality}}</td>
                    <td class="p-3">ប្រទេស​ Country</td>
                    <td class="p-3">: {{$stu['family_info']->mother->country}}</td>
                    <td class="p-3">មុខរបរ​​​ Occupation</td>
                    <td class="p-3">: {{$stu['family_info']->mother->occupation}}</td>
                </tr>
                <tr class="border">
                    <td class="p-3">Guardian Phone Number</td>
                    <td class="p-3">: {{ $stu['gphone']}}</td>
                </tr>
            </table>

            <table class="border w-full font-medium">
                <tr>
                    <th class="p-2 bg-blue-800 text-white">ហត្ថលេខា និងឈ្មោះអ្នកទទួល <br> 
                        Receptionist's Signature and Name 
                    </th>
                    <th class="p-2 bg-blue-800 text-white">ហត្ថលេខា និងឈ្មោះអ្នកទទួល <br> 
                        Receptionist's Signature and Name <br>
                    </th>
                </tr>
                <tr class="text-center">
                    <td class="pt-4 pb-4">
                        ....................................................................<br>
                        Phnom Penh, DD................ MM.................YYYY..............
                    </td>
                     <td class="pt-4 pb-4">
                        ....................................................................<br>
                        Phnom Penh, DD................ MM.................YYYY..............
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        const btn = document.getElementById('print_report');
        btn.addEventListener('click', function(){
            window.print();
        })
    </script>
    @include('split.scripts')
</body>
</html>