@extends('main')

@section('metasConfig')
    <x-meta-config title='Dashboard' description='' />
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
                    color='cm-secondary'
                    icon='bi bi-speedometer'
                    title='Dashboard'
                    type='Visualizar'
                />
            </section>
            @include('admin/dashboard/body/index')
        </section>
    </section>

    <x-footer />
@endsection
