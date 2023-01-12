@extends('main')

@section('metasConfig')
    <x-meta-config title='Editar perfil' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            {{ App\Actions\ProfileActions::handle('edit') }}

            @include("admin/profile/body/read")
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
