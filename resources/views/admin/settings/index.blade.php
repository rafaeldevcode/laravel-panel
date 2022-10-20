@extends('main')

@section('metasConfig')
    <x-meta-config title='Configurações' description='' />
@endsection

@section('content')
    @isset($message)
        <x-message :type='$type' :text='$message' />
    @endisset

    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            <section class='p-3'>
                <x-breadcrumps
                    color='cm-primary'
                    icon='bi bi-gear-fill'
                    title='Configurações'
                    type='Editar'
                />
            </section>
            @include('admin/settings/body/index', ['settings' => $settings])
        </section>
    </section>

    <x-footer />
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
    </script>
@endsection
