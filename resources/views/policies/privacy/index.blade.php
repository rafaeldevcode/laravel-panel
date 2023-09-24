@extends('main')

@section('metasConfig')
    <x-meta-config title='Políticas de Privacidade' description='' />
@endsection

@section('content')
    @include("policies/privacy/body/read")
@endsection
