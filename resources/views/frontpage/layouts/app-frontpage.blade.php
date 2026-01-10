<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIMATIF | @yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon-16x16.png') }}" sizes="16x16" />
    <!-- CSS Slick -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Slick JS -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet"> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
    @vite(['resources/css/app-frontpage.css'])
    @yield('style')
</head>

<body class="@yield('pageClass') text-black">

    @include('frontpage.layouts.navbar')

    @yield('content')

    @include('frontpage.layouts.footer')

    @yield('script')
</body>

</html>
