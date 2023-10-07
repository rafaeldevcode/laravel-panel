@extends('main')

@section('metasConfig')
    <x-meta-config title='Verificar email' />
@endsection

@section('content')
    <section class='vw-100 vh-100 d-flex justify-content-center align-items-center p-3'>
        <div class='border border-1 border-color-main rounded px-4 py-5 col-12 col-sm-8 col-md-6 shadow'>
            <form action="{{ route('reset.pass', ['insert', 'pass']) }}">
                <h1 class='text-center fs-3'>Enviamos um token de verificação para seu email.</h1>

                <x-input-number name='token' label='Token de verificação' icon='bi bi-123' required />

                <div class='py-2 col-12 d-flex justify-content-end'>
                    <x-input-button type='submit' title='Verificar email' value='Verificar' style='color-main' />
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
    </script>
@endsection
