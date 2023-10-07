@extends('main')

@section('metasConfig')
    <x-meta-config title='Termos de Uso' />
@endsection

@section('content')
    @include("policies/terms/body/read")
@endsection
