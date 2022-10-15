<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600;700;800&display=swap" rel="stylesheet">


    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/logos/logoicon.ico') }}" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])


</head>

<body>
    <div id="app">


        <main class="py-4">
            @yield('guest-content')
        </main>
    </div>
@yield('scripts')
</body>
</html>
