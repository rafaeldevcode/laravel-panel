@extends('main')

@section('metasConfig')
    <x-meta-config title='Políticas de Privacidade' />
@endsection

@section('content')
    @include("policies/privacy/body/read")
@endsection
