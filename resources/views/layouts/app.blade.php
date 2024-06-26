<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     @include('split.style')
    <title>Teavada Register</title>
</head>
<body>

   {{-- navbar --}}
   @include('split.navbar')
   {{-- end navbar --}}

   {{-- sidebar --}}
   @include('split.sidebar')
   {{-- end sidebar --}}

   <div class="p-4 sm:ml-64">
      @yield('content')
   </div>

@include('split.scripts')
</body>
</html>