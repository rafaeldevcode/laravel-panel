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
</head>
<body>

    <main class='flex flex-nowrap justify-between w-full'>
        <x-sidebar />

        <section class='w-full'>
            <x-header />

            {{ App\Actions\DashboardActions::handle() }}

            @yield('content')
        </section>
    </main>

    <x-flash-message />

    <script type="text/javascript" src="{{ asset('libs/jquery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/main.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/scripts/class/Modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Cookies.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/PageBack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Preloader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Message.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Password.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/ValidateForm.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Remove.js') }}"></script>
    <script type="text/javascript">
        Menu.checkIsOpen();
        Menu.admin($('#checkbox-menu'));
        Message.hide();
        Password.show('[data-id-pass]');

        // Validate the form
        const validate = new ValidateForm();
        validate.init();

        // Delete item(s)
        const remove = new Remove();
        remove.init();

        PageBack.init();

        document.addEventListener("DOMContentLoaded", function() {
            Preloader.hide();
        });

        Modal.init();
    </script>
</body>
</html>
