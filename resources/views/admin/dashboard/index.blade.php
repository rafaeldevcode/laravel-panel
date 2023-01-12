@extends('main')

@section('metasConfig')
    <x-meta-config title='Dashboard' description='' />
@endsection

@section('content')
    <section class='d-flex flex-nowrap justify-content-between w-100'>
        <x-sidebar />

        <section class='w-100'>
            <x-header />

            {{ App\Actions\DashboardActions::handle() }}

            @include("admin/dashboard/body/read")
        </section>
    </section>

    <x-footer />
@endsection
