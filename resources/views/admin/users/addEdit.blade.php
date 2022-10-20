@php
    $action_type = $method == 'add' ? 'Adicionar' : 'Editar';
    $action_color = $method == 'add' ? 'cm-success' : 'cm-primary';
@endphp

@extends('main')

@section('metasConfig')
    <x-meta-config title="{{ $action_type }} usuário" description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            <section class='p-3'>
                <x-breadcrumps
                    :color='$action_color'
                    icon='bi bi-people-fill'
                    title='Usuários'
                    :type='$action_type'
                />
            </section>

            @include("admin/users/addEditBody/{$method}")
        </section>
    </section>

    <x-footer />
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        showPass();
    </script>
@endsection
