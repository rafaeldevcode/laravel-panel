@extends('main')

@section('metasConfig')
    <x-meta-config title='Listar permissões' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            <section class='p-3'>
                <x-breadcrumps
                    color='cm-secondary'
                    icon='bi bi-file-earmark-lock-fill'
                    title='Permissões'
                    type='Visualizar'
                    :options='$options'
                    route='/admin/delete/several/permissions'
                />
            </section>

            @include('admin/permissions/body/index', $permissions)
        </section>
    </section>

    <x-footer />
@endsection


@section('scripts')
    <script type="text/javascript">
        const buttons = document.querySelectorAll('[data-button="delete"]');

            buttons.forEach((button) => {
                $(button).click((event) => {
                    deleteItem(event);
                });
            });

            $('[data-button="select-several"]').click((event) => {
                selectSeveral(event);
            });

            $('[data-button="delete-several"]').click((event) => {
                deleteAllItems(event);
            });

            $('[data-button="delete-enable"').click(() => {
                disableEnableBtn();
            });
    </script>
@endsection
