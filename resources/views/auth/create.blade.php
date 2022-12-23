@extends('main')

@section('metasConfig')
    <x-meta-config title='Realizar cadastro' description='' />
@endsection

@section('content')
    <section class="vh-100 vw-100 d-flex flex-nowrap">
        <x-bg-login src='/assets/images/login_bg_3.png' />

        <div class='d-flex flex-column justify-content-center align-items-center col-12 col-lg-5 p-2'>
            <x-logo />

            <form class='col-12 col-sm-6' method="POST" action="/register">
                @csrf
                <x-input-text name='name' label='Nome' icon='bi bi-person-fill' required />

                <x-input-email name='email' label='Email' icon='bi bi-envelope-fill' required />

                <x-input-pass name='password' label='Senha' required />

                <x-input-pass name='confirm_password' label='Confirme sua senha' required />

                <div class='my-4'>
                    <x-input-checkbox-switch name='remember' label='Mantenha-me conectado' />

                    <ul class='d-flex flex-nowrap justify-content-between ps-0'>
                        <li>
                            <a href='/login' class='text-color-main' title="Realizar login">Realizar login</a>
                        </li>
                    </ul>
                </div>

                <x-input-button type='submit' title='Fazer cadastro' value='Salvar' style='color-main' />
            </form>

            <x-login-social />
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        showPass();
    </script>
@endsection
