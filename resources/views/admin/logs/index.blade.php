@extends('main')

@section('metasConfig')
    <x-meta-config title='Logs do sistema' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            {{ App\Actions\LogsActions::handle() }}

            @include('admin/logs/body/index')
        </section>
    </section>

    <x-footer />
    @include('admin/logs/partials/modal-clear-logs')
@endsection
