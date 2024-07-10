@extends('layouts.app')

@section('content')
<div class="relative mt-[45px] overflow-x-auto shadow-md sm:rounded-lg">
    <div class="w-full pt-5 pb-5 relative flex items-center justify-between">
    <div class="relative">
        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <form action="/dashboard/list/students" class="inline" method="GET">
            <input type="text" id="table-search-users" value="{{ old('query', $query ?? '') }}" name="search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
        </form>
    </div>

        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            <a href="/dashboard/add/student">Add student</a> 
        </button>
    </div>
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
            @if($student->count())
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
                    <form action="/dashboard/delete/student/{{ $stu->id }}" method="POST" class="inline" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button data-modal-hide="popup-modal" type="submit" class="text-white dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center text-center">
                            <svg class="w-6 h-6 text-red-500 dark:text-white cursor-pointer " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </form> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">
    {{ $student->links() }}
</div>
@else
 <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
    No student name not found matching your seach query.
  </div>
</div>
@endif

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item?');
    }
</script>
@endsection