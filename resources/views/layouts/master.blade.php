<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Registration</title>
    @include('shares.styles')
</head>
<body>
    @auth
    <div id="main-wrapper">
        {{-- Nav Header --}}
        @include('shares.Navbar')
        {{-- End Nav Header --}}

        {{-- Header --}}
        @include('shares.Header')
        {{-- End Header --}}

        {{-- Slide --}}
        @include('shares.Slide')
        {{-- End slide --}}
    @endauth

        @yield('content')

    @auth
        {{-- Footer --}}
        @include('shares.Footer')
        {{-- End footer --}}
    @endauth

    </div>
    @include('shares.scripts')
</body>
</html>