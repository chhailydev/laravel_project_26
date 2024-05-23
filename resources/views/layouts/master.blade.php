<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Registration</title>
    @include('shares.styles')
</head>
<body>
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

        @yield('content')

        {{-- Footer --}}
        @include('shares.Footer')
        {{-- End footer --}}

    </div>
    @include('shares.scripts')
</body>
</html>