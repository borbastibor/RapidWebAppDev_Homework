<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-danger p-0 m-0">
            <div class="container-fluid p-0 m-1">
                <a class="navbar-brand p-0 m-0" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" />
                </a>
            </div>            
        </nav>
        @include('menu')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="bg-dark text-white text-center p-2">
        Copyright © 2010 - {{ date('Y') }} Szeghalmi Mentőalapítvány.<br>
        Original website: <a href="http://szeghalmimentoalapitvany.hu/" target="_blank">Szeghalmi Mentőalapítvány</a><br>
        Designed by Borbás Tibor
    </footer>
    @stack('scripts')
</body>
</html>
