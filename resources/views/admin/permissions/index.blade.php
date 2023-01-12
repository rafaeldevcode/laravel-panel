@extends('main')

@section('metasConfig')
    <x-meta-config title='Listar permissões' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            {{ App\Actions\PermissionsActions::handle($method) }}

            @include("admin/permissions/body/{$method}")
        </section>
    </section>

    <x-footer />
@endsection


@section('scripts')
    <script type="text/javascript">
        getFields();
        addExtraPermissions();
        alterStatusPermissions();
        optionsDelete();
    </script>
@endsection
