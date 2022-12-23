@extends('main')

@section('metasConfig')
    <x-meta-config title='Editar perfil' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            <section class='p-3'>
                <x-breadcrumps
                    color='cm-primary'
                    icon='bi bi-person-bounding-box'
                    title='Perfil'
                    type='Editar'
                />
            </section>
            @include('admin/profile/body/index', $user)
        </section>
    </section>

    <x-footer />
    @include('admin/profile/partials/profile-popup')
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        showPass();
    </script>
@endsection
