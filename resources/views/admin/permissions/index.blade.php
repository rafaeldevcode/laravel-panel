@extends('main')

@section('metasConfig')
    <x-meta-config title='Listar permissões' description='' />
@endsection

@section('content')
    @include("admin/permissions/body/{$method}")
@endsection
