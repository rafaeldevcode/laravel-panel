@extends('main')

@section('metasConfig')
    <x-meta-config title='Configurações' description='' />
@endsection

@section('content')
    @include("admin/settings/body/form")
@endsection
