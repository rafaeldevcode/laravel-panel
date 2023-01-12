@extends('main')

@section('metasConfig')
    <x-meta-config title='Listar usuários' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            {{ App\Actions\UsersActions::handle($method) }}

            @include("admin/users/body/{$method}")
        </section>
    </section>

    <x-footer />
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        showPass();
        optionsDelete();
    </script>
@endsection
