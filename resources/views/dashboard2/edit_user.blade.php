@vite(['resources/css/app.css', 'resources/js/app.js'])
@include('split.style')
<div class="flex items-center justify-center w-full relative bg-gray-400 h-screen">
<div class="m-auto justify-center items-center w-full flex">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    EDIT USER ACCOUNT
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-update">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form action="/dashboard/update/account/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                    @csrf
                    @method('PUT')
                    <div class="bg-blue-200 relative" id="file-update-edit-u" style="width:90px; height:90px; border-radius: 50%;">
                        <input type="file" name="profile" class="relative z-50 top-6 right-2 opacity-0" id="file-input-edit-u">
                        <div id="upload-title" class="relative z-10">
                            <svg class="w-5 h-5 text-gray-300 m-auto dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01"/>
                            </svg>
                        </div>
                        @if($user->profile)
                        <img class="w-[90px] h-[90px] rounded-full top-0 absolute z-20" id="image-preview-edit-u" src="{{ route('profile_image', ['id' => $user->id]) }}" alt="Jese image">
                        @else
                        <img src="{{ asset('assets/noImage.jpg')}}" class="w-10 h-10 rounded-full" alt="">
                        @endif
                    </div>
                    <input type="username" name="username" value="{{ $user->useranme}}" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Username" required />
                    <input type="email" name="email" id="email" value="{{ $user->email }}" placeholder="youremail@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                     <div class="col-span-2 sm:col-span-1 w-full">
                        <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select role</option>
                            @foreach ($role as $r )
                                <option value="{{ $r->id }}" {{ $user->role_id === $r->id ? 'selected': ''}}>{{$r->role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update account</button>
                </form>
                <button type="button" class="w-[80%] relative left-[37px] top-[6px] text-white bg-gray-400 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="/dashboard/account">Cancel</a>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    const fileInputEdit = document.getElementById('file-input-edit-u');
    const fileUploadEdit = document.getElementById('file-update-edit-');
    const imagePreviewEdit = document.getElementById('image-preview-edit-u');

    fileUploadEdit.addEventListener('click', () => {
        fileInputEdit.click();
    });

    function displayFileUpdate(file) {
        if (file instanceof Blob) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreviewEdit.src = e.target.result;
                imagePreviewEdit.style.display = 'block';
            }
            reader.readAsDataURL(file); // This line was missing
        }
    }

    fileInputEdit.addEventListener('change', () => {
        if (fileInputEdit.files && fileInputEdit.files[0]) {
            displayFileUpdate(fileInputEdit.files[0]);
        }
    });
</script>