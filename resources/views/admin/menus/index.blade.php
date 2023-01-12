@extends('main')

@section('metasConfig')
    <x-meta-config title='Listar menus' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            {{ App\Actions\MenuActions::handle($method) }}

            @include("admin/menus/body/{$method}")
        </section>
    </section>

    <x-footer />
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        addSubmenu();
        removeSubmenus();
        optionsDelete();
    </script>
@endsection
