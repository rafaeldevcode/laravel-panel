@extends('main')

@section('metasConfig')
    <x-meta-config title='Site em construção' description='' />
@endsection

@section('content')
    <section class='vw-100 vh-100 d-flex justify-content-center align-items-center custom-construction'>
        <div class='container d-flex justify-content-center align-items-center border rounded border-color-main m-2 custom-construction-mirror'>
            <ul class='text-color-main text-center'>
                <li class='fw-bolder display-6'>Construção</li>
                <li class='display-6'>Ainda estamos em processo de construção.</li>
                <li class='display-6'>Em breve estaremos no ar!</li>
            </ul>
        </div>
    </section>
@endsection
