<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     @include('split.style')
    <title>Teavada Register</title>
    <script>
         if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
         } else {
            document.documentElement.classList.remove('dark')
         }
    </script>
</head>
<body class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">

   {{-- navbar --}}
   @include('split.navbar')
   {{-- end navbar --}}

   {{-- sidebar --}}
   @include('split.sidebar')
   {{-- end sidebar --}}

   <div class="p-4 sm:ml-64 h-screen">
      @yield('content')
   </div>

@include('split.scripts')
</body>
</html>