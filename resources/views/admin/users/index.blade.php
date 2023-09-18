@extends('main')

@section('metasConfig')
    <x-meta-config title='Listar usuários' description='' />
@endsection

@section('content')
    @include("admin/users/body/{$method}")
@endsection

