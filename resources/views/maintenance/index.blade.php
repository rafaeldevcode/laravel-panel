@extends('main')

@section('metasConfig')
    <x-meta-config title='Site em manutenção' />
@endsection

@section('content')
    <section class='vw-100 vh-100 d-flex justify-content-center align-items-center custom-maintenance'>
        <div class='container d-flex justify-content-center align-items-center border rounded border-color-main m-2 custom-maintenance-mirror'>
            <ul class='text-color-main text-center'>
                <li class='fw-bolder display-6'>Manutenção</li>
                <li class='display-6'>Estamos ajustando algumas melhorias.</li>
                <li class='display-6'>Voltamos em breve!</li>
            </ul>
        </div>
    </section>
@endsection
