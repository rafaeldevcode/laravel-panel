<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full w-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='{{ asset('/libs/tailwind/style.css') }}' />
    <link rel='stylesheet' href='{{ asset('/libs/bootstrap-icons/bootstrap-icons.min.css') }}' />
    <link rel='stylesheet' href='{{ asset('/assets/css/globals.css') }}' />
    <meta name='author' content='Rafael Vieira | github.com/rafaeldevcode' />
    <x-favicon />

    <x-meta-config title='Login' />
</head>
<body class="h-full w-full">

    <main class="h-full w-full flex flex-nowrap overflow-hidden">
        <x-bg-login />

        <div class='flex flex-col justify-center items-center w-full lg:w-5/12 p-2'>
            <x-logo />

            <form class='w-full sm:w-6/12 md:w-7/12' method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="pb-1">
                    <x-input-default name='email' label='Usuário' icon='bi bi-person-fill' type="email" required />
                </div>

                <div class="pb-1">
                    <x-input-default name='password' label='Senha' icon="bi bi-envelope-fill" type="password" required />
                </div>

                <div class='my-4'>
                    <x-input-checkbox-switch name='remember' label='Mantenha-me conectado' />
                </div>

                <div class="flex justify-end">
                    <x-input-button type='submit' title='Fazer login' value='Logar' style='color-main' />
                </div>
            </form>
        </div>
    </main>

    <x-flash-message />

    <script type="text/javascript" src="{{ asset('libs/jquery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Message.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/Password.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/class/ValidateForm.js') }}"></script>

    <script type="text/javascript">
        Message.hide();
        Password.show('[data-id-pass]');

        // Validate the form
        const validate = new ValidateForm();
        validate.init();
    </script>
</body>
</html>
