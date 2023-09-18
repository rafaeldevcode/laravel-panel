<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='{{ asset('/libs/tailwind/style.css') }}' />
    <link rel='stylesheet' href='{{ asset('/libs/bootstrap-icons/bootstrap-icons.min.css') }}' />
    <link rel='stylesheet' href='{{ asset('/assets/css/globals.css') }}' />
    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <x-favicon />

    @yield('metasConfig')
    @include('script')
</head>
<body>

    <x-message />

    <main class='flex flex-nowrap justify-between w-full'>
        <x-sidebar />

        <section class='w-full'>
            <x-header />

            {{ App\Actions\DashboardActions::handle() }}

            @yield('content')
        </section>
    </main>

    @yield('scripts')
</body>
</html>
