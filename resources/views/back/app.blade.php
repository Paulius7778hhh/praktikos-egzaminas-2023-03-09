<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/back/app.scss', 'resources/js/back/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">

    <div class="card-header">
        <h1 class="d-flex justify-content-center mt-5 mb-5">{{-- title --}}</h1>



    </div>








    @include('back.meniu')
    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <footer class="navbar-dark bg-dark justify-content-center mt-auto">
        <nav class="pt-5 text-white nav justify-content-center mb-3">
            <address></address>
        </nav>

    </footer>





</body>

</html>
