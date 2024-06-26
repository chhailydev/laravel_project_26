@extends('layouts.app')

@section('content')
<div class="relative mt-[45px] overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
           List students
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    KHMER NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    LATIN NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    GENDER
                </th>
                <th scope="col" class="px-6 py-3">
                    DATE OF BIRTH
                </th>
                <th scope="col" class="px-6 py-3">
                    EMAIL
                </th>
                <th scope="col" class="px-6 py-3">
                    PHONE
                </th>
                <th scope="col" class="px-6 py-3">
                    PROGRAM
                </th>
                <th scope="col" class="px-6 py-3">
                    DEGREE
                </th>
                <th scope="col" class="px-6 py-3">
                    SHIFT
                </th>
                <th scope="col" class="px-6 py-3">
                    COUNTRY
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $stu)   
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 flex items-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @if($stu->picture)
                       <img src="{{ route('profile', ['id' => $stu->id ])}}" alt="" class="w-10 h-10 rounded-full">
                    @else
                       <img src="{{ asset('assets/noImage.jpg')}}" alt="" class="w-10 h-10 rounded-full">
                    @endif
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $stu->kh_name }}</div>
                    </div>  
                </th>
                <td class="px-6 py-4">
                    {{ $stu->latin_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $stu->gender }}
                </td>
                <td class="px-6 py-4">
                    {{ $stu->dob }}
                </td>
                <td class="px-6 py-4">
                    {{ $stu->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $stu->phone_number}}
                </td>
                <td class="px-6 py-4">
                    {{ $stu->programs }}
                </td>
                <td class="px-6 py-4">
                    {{ $stu->degrees }}
                </td>
                <td class="px-6 py-4">
                    {{ $stu->shift }}
                </td>
                <td class="px-6 py-4">
                    {{ $stu->country}}
                </td>
                <td class="px-6 py-4 text-right flex items-center gap-2 justify-center">
                    <a href="/dashboard/view/student/{{ $stu->id }}">
                        <svg class="w-6 h-6 text-green-500 dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </a>

                    <a href="/dashboard/update/form/{{ $stu->id }}">
                        <svg class="w-6 h-6 text-blue-500 dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                    </a>
                     <button data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                        <svg class="w-6 h-6 text-red-500 dark:text-white cursor-pointer " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                        </svg>
                     </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this student?</h3>
                <form action="" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                </form>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection