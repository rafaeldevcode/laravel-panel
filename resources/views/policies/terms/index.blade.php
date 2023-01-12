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

            {{ App\Actions\PrivacyActions::handle() }}

            @include("policies/terms/body/read")
        </section>
    </section>

    <x-footer />
@endsection
