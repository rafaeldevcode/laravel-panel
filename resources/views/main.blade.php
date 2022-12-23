<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='{{ asset('/assets/css/style.css') }}' />
    <link rel='stylesheet' href='{{ asset('/libs/bootstrap/bootstrap-icons.css') }}' />
    <link rel='stylesheet' href='{{ asset('/assets/css/globals.css') }}' />
    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <x-favicon />

    @yield('metasConfig')
    @include('script')
</head>
<body>

    <x-message />

    @yield('content')

    @auth
        <x-notifications />
    @endauth

    @yield('scripts')
</body>
</html>
