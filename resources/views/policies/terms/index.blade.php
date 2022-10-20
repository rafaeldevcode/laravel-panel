@extends('main')

@section('metasConfig')
    <x-meta-config title='Termos de Uso' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        @auth
            <x-sidebar />
        @endauth

        <section class='w-100'>
            <x-header />

            <section class='p-3'>
                <x-breadcrumps
                    color='cm-secondary'
                    icon='bi bi-file-earmark-text-fill'
                    title='Termos de Uso'
                    type='Visualizar'
                />
            </section>
            @include('policies/terms/body/index')
        </section>
    </section>

    <x-footer />
@endsection
