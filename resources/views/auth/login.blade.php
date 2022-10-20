@extends('main')

@section('metasConfig')
    <x-meta-config title='Realizar login' description='' />
@endsection

@section('content')
    @isset($message)
        <x-message :type='$type' :text='$message' />
    @endisset

    <section class="vh-100 vw-100 d-flex flex-nowrap">
        <x-bg-login />

        <div class='d-flex flex-column justify-content-center align-items-center col-12 col-lg-5 p-2'>
            <x-logo />

            <form class='col-12 col-sm-6' method="POST" action="/login">
                @csrf
                <x-input-email name='email' label='Usuário' icon='bi bi-person-fill' required />

                <x-input-pass name='password' label='Senha' required />

                <div class='my-4'>
                    <x-input-checkbox-switch name='remember' label='Mantenha-me conectado' />

                    <ul class='d-flex flex-nowrap justify-content-between ps-0'>
                        {{-- <li>
                            <a href='/register' class='text-color-main' title="Realizar cadastro">Realizar cadastro</a>
                        </li> --}}
                        <li>
                            <a href='/reset-password?insert=email' class='text-color-main' title="Esqueci minha senha">Esqueci minha senha</a>
                        </li>
                    </ul>
                </div>

                <x-input-button type='submit' title='Fazer login' value='Logar' style='color-main' />
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        showPass();
    </script>
@endsection
