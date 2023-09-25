@extends('main')

@section('metasConfig')
    <x-meta-config title='Resetar minha senha' description='' />
@endsection

@section('content')
    <section class='vw-100 vh-100 d-flex justify-content-center align-items-center p-3'>
        <div class='border border-1 border-color-main rounded px-4 py-5 col-12 col-sm-8 col-md-6 shadow'>

            @switch($insert)
                @case('email')

                    <form action="{{ route('reset.pass', ['insert', 'token']) }}">
                        <h1 class='text-center fs-3'>Por favor informe seu email</h1>

                        <x-input-email name='email' label='Email' icon='bi bi-envelope-fill' required />

                        <div class='col-12 d-flex justify-content-end'>
                            <x-input-button type='submit' title='Enviar email' value='Enviar' style='color-main' />
                        </div>
                    </form>
                    @break
                @case('token')

                    <form action="{{ route('reset.pass', ['insert', 'pass']) }}">
                        <h1 class='text-center fs-3'>Enviamos um token de verificação para seu email.</h1>

                        <x-input-number name='token' label='Token de verificação' icon='bi bi-123' required />

                        <div class='py-2 col-12 d-flex justify-content-end'>
                            <x-input-button type='submit' title='Verificar email' value='Verificar' style='color-main' />
                        </div>
                    </form>
                    @break
                @case('pass')

                    <form onSubmit={resetPass}>
                        <h1 class='text-center fs-3'>Digite sua nova senha</h1>

                        <x-input-pass name='password' label='Senha' required />

                        <x-input-pass name='confirm_password' label='Confirme sua senha' required />

                        <div class='py-2 col-12 d-flex justify-content-end'>
                            <x-input-button type='submit' title='Redefinir senha' value='Redefinir' style='color-main' />
                        </div>
                    </form>
                    @break
                @default

            @endswitch
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        showPass();
    </script>
@endsection
